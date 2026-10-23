<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Iposter;
use App\Models\News;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{
    /**
     * Display the Backup & Export dashboard
     */
    public function index()
    {
        $backupDir = base_path('backups');
        if (!File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true, true);
        }

        // List existing backup files in the local backups folder
        $localBackups = [];
        $files = File::files($backupDir);
        // Sort newest first
        usort($files, fn($a, $b) => $b->getMTime() - $a->getMTime());

        foreach ($files as $file) {
            $ext = strtolower($file->getExtension());
            if (in_array($ext, ['json', 'sql', 'sqlite', 'zip'])) {
                $localBackups[] = [
                    'name' => $file->getFilename(),
                    'path' => $file->getRealPath(),
                    'size' => $this->formatFileSize($file->getSize()),
                    'date' => date('M d, Y h:i A', $file->getMTime()),
                    'ext' => $ext,
                ];
            }
        }

        $stats = [
            'news_count' => News::count(),
            'careers_count' => Career::count(),
            'solutions_count' => Solution::count(),
            'iposters_count' => Iposter::count(),
            'users_count' => User::count(),
            'sqlite_size' => file_exists(database_path('database.sqlite')) 
                ? $this->formatFileSize(filesize(database_path('database.sqlite'))) 
                : 'N/A',
            'uploads_size' => $this->getDirectorySize(public_path('uploads')),
            'backups_count' => count($localBackups),
            'backups_folder' => $backupDir,
        ];

        return view('admin.backup.index', compact('stats', 'localBackups'));
    }

    /**
     * Download the raw SQLite database file directly (and save copy in backups/)
     */
    public function downloadSqlite()
    {
        $dbPath = database_path('database.sqlite');
        if (!file_exists($dbPath)) {
            return back()->with('error', 'Database file database.sqlite was not found.');
        }

        $backupDir = base_path('backups');
        if (!File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true, true);
        }

        $filename = 'globaltronics_db_backup_' . date('Y-m-d_H-i-s') . '.sqlite';
        $savedPath = $backupDir . DIRECTORY_SEPARATOR . $filename;
        copy($dbPath, $savedPath);

        return response()->download($savedPath, $filename, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Export all CMS records as a structured JSON backup file (and save copy in backups/)
     */
    public function exportJson()
    {
        $data = [
            'metadata' => [
                'exported_at' => now()->toIso8601String(),
                'platform' => 'Globaltronics CMS v2',
                'app_env' => config('app.env'),
            ],
            'users' => User::select('id', 'name', 'email', 'password', 'created_at', 'updated_at')->get(),
            'news' => News::all(),
            'careers' => Career::all(),
            'solutions' => Solution::all(),
            'iposters' => Iposter::all(),
        ];

        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $filename = 'globaltronics_cms_backup_' . date('Y-m-d_H-i-s') . '.json';

        $backupDir = base_path('backups');
        if (!File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true, true);
        }
        file_put_contents($backupDir . DIRECTORY_SEPARATOR . $filename, $json);

        return response()->streamDownload(function () use ($json) {
            echo $json;
        }, $filename, [
            'Content-Type' => 'application/json',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Export all CMS records as a MySQL-compatible .sql dump file (and save copy in backups/)
     */
    public function exportSql()
    {
        $sql = "-- Globaltronics CMS MySQL Export Dump\n";
        $sql .= "-- Exported on: " . now()->toDateTimeString() . "\n";
        $sql .= "-- Target: Hostinger MySQL / phpMyAdmin\n\n";
        $sql .= "SET FOREIGN_KEY_CHECKS=0;\n\n";

        $tables = [
            'users' => User::all()->toArray(),
            'news' => News::all()->toArray(),
            'careers' => Career::all()->toArray(),
            'solutions' => Solution::all()->toArray(),
            'iposters' => Iposter::all()->toArray(),
        ];

        foreach ($tables as $table => $rows) {
            $sql .= "-- --------------------------------------------------------\n";
            $sql .= "-- Table data for `{$table}` (" . count($rows) . " rows)\n";
            $sql .= "-- --------------------------------------------------------\n";
            
            if (empty($rows)) {
                $sql .= "-- (No rows)\n\n";
                continue;
            }

            foreach ($rows as $row) {
                $columns = array_map(fn($c) => "`{$c}`", array_keys($row));
                $values = array_map(function ($val) {
                    if (is_null($val)) return "NULL";
                    if (is_bool($val)) return $val ? "1" : "0";
                    if (is_array($val)) return "'" . addslashes(json_encode($val, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) . "'";
                    if (is_numeric($val)) return $val;
                    return "'" . addslashes((string)$val) . "'";
                }, array_values($row));

                $sql .= "REPLACE INTO `{$table}` (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $values) . ");\n";
            }
            $sql .= "\n";
        }

        $sql .= "SET FOREIGN_KEY_CHECKS=1;\n";

        $filename = 'globaltronics_mysql_backup_' . date('Y-m-d_H-i-s') . '.sql';

        $backupDir = base_path('backups');
        if (!File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true, true);
        }
        file_put_contents($backupDir . DIRECTORY_SEPARATOR . $filename, $sql);

        return response()->streamDownload(function () use ($sql) {
            echo $sql;
        }, $filename, [
            'Content-Type' => 'application/sql',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Export all uploaded media files into a ZIP archive
     */
    public function exportMediaZip()
    {
        $backupDir = base_path('backups');
        if (!File::isDirectory($backupDir)) {
            File::makeDirectory($backupDir, 0755, true, true);
        }

        $filename = 'globaltronics_media_uploads_' . date('Y-m-d_H-i-s') . '.zip';
        $zipPath = $backupDir . DIRECTORY_SEPARATOR . $filename;

        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) !== true) {
            return back()->with('error', 'Failed to create ZIP archive.');
        }

        $uploadsDir = public_path('uploads');
        if (File::isDirectory($uploadsDir)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($uploadsDir),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = 'uploads/' . substr($filePath, strlen($uploadsDir) + 1);
                    $zip->addFile($filePath, str_replace('\\', '/', $relativePath));
                }
            }
        }

        $zip->close();

        return response()->download($zipPath, $filename, [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Download a specific file from the backups folder
     */
    public function downloadFile($filename)
    {
        // Sanitize filename to prevent directory traversal
        $filename = basename($filename);
        $path = base_path('backups' . DIRECTORY_SEPARATOR . $filename);

        if (!file_exists($path)) {
            return back()->with('error', 'File not found: ' . $filename);
        }

        return response()->download($path, $filename);
    }

    /**
     * Delete a specific backup file
     */
    public function deleteFile($filename)
    {
        $filename = basename($filename);
        $path = base_path('backups' . DIRECTORY_SEPARATOR . $filename);

        if (file_exists($path)) {
            unlink($path);
            return back()->with('success', 'Backup file deleted successfully: ' . $filename);
        }

        return back()->with('error', 'File not found: ' . $filename);
    }

    /**
     * Open the local backups folder in Windows File Explorer
     */
    public function openFolder()
    {
        $backupDir = base_path('backups');
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            @pclose(@popen('start "" explorer.exe "' . $backupDir . '"', 'r'));
            return back()->with('success', 'Opened Backups folder in Windows File Explorer: ' . $backupDir);
        }

        return back()->with('info', 'Folder location: ' . $backupDir);
    }

    /**
     * Import a JSON CMS backup file
     */
    public function importJson(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file|max:51200'
        ]);

        $content = file_get_contents($request->file('backup_file')->getRealPath());
        $data = json_decode($content, true);

        if (!$data || !isset($data['news'])) {
            return back()->with('error', 'Invalid backup format. File must be a valid Globaltronics CMS JSON export.');
        }

        DB::beginTransaction();
        try {
            $importedCounts = [
                'news' => 0,
                'careers' => 0,
                'solutions' => 0,
                'iposters' => 0,
            ];

            // Import News
            if (!empty($data['news'])) {
                foreach ($data['news'] as $item) {
                    News::updateOrCreate(
                        ['id' => $item['id']],
                        $item
                    );
                    $importedCounts['news']++;
                }
            }

            // Import Careers
            if (!empty($data['careers'])) {
                foreach ($data['careers'] as $item) {
                    Career::updateOrCreate(
                        ['id' => $item['id']],
                        $item
                    );
                    $importedCounts['careers']++;
                }
            }

            // Import Solutions
            if (!empty($data['solutions'])) {
                foreach ($data['solutions'] as $item) {
                    Solution::updateOrCreate(
                        ['id' => $item['id']],
                        $item
                    );
                    $importedCounts['solutions']++;
                }
            }

            // Import iPosters
            if (!empty($data['iposters'])) {
                foreach ($data['iposters'] as $item) {
                    Iposter::updateOrCreate(
                        ['id' => $item['id']],
                        $item
                    );
                    $importedCounts['iposters']++;
                }
            }

            DB::commit();

            return back()->with('success', "Backup restored successfully! Synced {$importedCounts['news']} news, {$importedCounts['careers']} careers, {$importedCounts['solutions']} solutions, and {$importedCounts['iposters']} iPosters.");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error restoring backup: ' . $e->getMessage());
        }
    }

    /**
     * Format bytes into human-readable string
     */
    private function formatFileSize($bytes)
    {
        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 2) . ' MB';
        }
        if ($bytes >= 1024) {
            return round($bytes / 1024, 1) . ' KB';
        }
        return $bytes . ' B';
    }

    /**
     * Calculate directory size
     */
    private function getDirectorySize($path)
    {
        if (!file_exists($path)) return '0 KB';
        $size = 0;
        foreach (File::allFiles($path) as $file) {
            $size += $file->getSize();
        }
        return $this->formatFileSize($size);
    }
}
