@extends('admin.layouts.admin')

@section('title', 'Backup, Export & Import CMS Data | Globaltronics CMS')

@section('content')
<div class="space-y-8">
    
    <!-- Top Header Banner -->
    <div class="bg-gradient-to-r from-slate-900 via-[#003896] to-[#0047ba] rounded-2xl p-6 sm:p-8 text-white shadow-xl relative overflow-hidden">
        <div class="absolute -right-10 -bottom-10 opacity-10 text-9xl">
            <i class="fa-solid fa-database"></i>
        </div>
        
        <div class="relative z-10 max-w-3xl">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-xs font-black uppercase tracking-wider mb-3">
                <i class="fa-solid fa-shield-halved text-yellow-300"></i>
                <span>Data Protection & Server Migration</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-black uppercase tracking-tight text-white mb-2">
                CMS Data Backup, Export & Hostinger Sync
            </h1>
            <p class="text-blue-100 text-xs sm:text-sm leading-relaxed">
                Export all news articles, job postings, reference installations, and iPosters before deploying to Hostinger. Files are saved directly to your local computer and can be restored anytime.
            </p>
        </div>
    </div>

    <!-- Feedback Alerts -->
    @if(session('success'))
        <div class="p-4 bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-check text-lg"></i>
            <span class="text-sm font-semibold">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="p-4 bg-rose-500/10 border border-rose-500/30 text-rose-400 rounded-xl flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation text-lg"></i>
            <span class="text-sm font-semibold">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Local Computer Backup Folder Location Banner -->
    <div class="bg-slate-900 border-2 border-yellow-500/40 rounded-2xl p-6 shadow-xl flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
        <div class="space-y-1.5 flex-1 min-w-0">
            <div class="flex items-center space-x-2 text-xs font-bold text-yellow-400 uppercase tracking-wide">
                <i class="fa-solid fa-folder-open text-base"></i>
                <span>Local Computer Backups Directory</span>
            </div>
            <p class="text-sm text-slate-300">
                All exported files are automatically stored on your computer in the folder below:
            </p>
            <div class="flex items-center gap-2 bg-slate-950 px-3.5 py-2 rounded-xl border border-slate-800 text-xs font-mono text-emerald-400 select-all overflow-x-auto max-w-full">
                <i class="fa-solid fa-hard-drive text-slate-500"></i>
                <span id="backups-path-text">{{ $stats['backups_folder'] }}</span>
            </div>
        </div>

        <div class="flex flex-wrap gap-2.5 shrink-0">
            <!-- Open in Explorer button -->
            <form action="{{ route('admin.backup.open.folder') }}" method="POST" class="inline">
                @csrf
                <button type="submit" 
                        class="px-4 py-2.5 bg-yellow-400 hover:bg-yellow-300 text-slate-950 font-black text-xs uppercase tracking-wider rounded-xl shadow transition-all flex items-center gap-2">
                    <i class="fa-solid fa-folder-open text-sm"></i>
                    <span>Open in File Explorer</span>
                </button>
            </form>

            <!-- Copy Path button -->
            <button onclick="copyBackupsPath()" 
                    id="copy-path-btn"
                    class="px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs uppercase tracking-wider rounded-xl border border-slate-700 transition-all flex items-center gap-2">
                <i class="fa-solid fa-copy"></i>
                <span>Copy Path</span>
            </button>
        </div>
    </div>

    <!-- Data Overview Metrics Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 text-center">
            <i class="fa-solid fa-newspaper text-blue-400 text-xl mb-1.5"></i>
            <p class="text-2xl font-black text-white">{{ $stats['news_count'] }}</p>
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">News Articles</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 text-center">
            <i class="fa-solid fa-briefcase text-yellow-400 text-xl mb-1.5"></i>
            <p class="text-2xl font-black text-white">{{ $stats['careers_count'] }}</p>
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Job Openings</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 text-center">
            <i class="fa-solid fa-tv text-cyan-400 text-xl mb-1.5"></i>
            <p class="text-2xl font-black text-white">{{ $stats['solutions_count'] }}</p>
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">LED Displays</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 text-center">
            <i class="fa-solid fa-tablet-screen-button text-purple-400 text-xl mb-1.5"></i>
            <p class="text-2xl font-black text-white">{{ $stats['iposters_count'] }}</p>
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">iPosters</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 text-center">
            <i class="fa-solid fa-database text-emerald-400 text-xl mb-1.5"></i>
            <p class="text-xl font-black text-white truncate">{{ $stats['sqlite_size'] }}</p>
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Database Size</p>
        </div>
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-4 text-center">
            <i class="fa-solid fa-box-archive text-yellow-400 text-xl mb-1.5"></i>
            <p class="text-2xl font-black text-white">{{ $stats['backups_count'] }}</p>
            <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Saved Backups</p>
        </div>
    </div>

    <!-- Export & Import Action Panels Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Panel 1: Export Data -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-blue-600/20 text-[#0047ba] flex items-center justify-center text-lg border border-blue-500/30">
                        <i class="fa-solid fa-download"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-black text-white uppercase tracking-wide">
                            Export CMS Data
                        </h2>
                        <p class="text-xs text-slate-400">
                            Download and save directly to your project's <code class="text-yellow-400 font-mono">backups/</code> directory.
                        </p>
                    </div>
                </div>

                <div class="space-y-3 my-6">
                    <!-- Option A: JSON Backup -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-file-code text-yellow-400"></i>
                                <span>Complete JSON Backup (.json)</span>
                            </p>
                            <p class="text-xs text-slate-400 mt-0.5">
                                Recommended. Easily re-imported in 1-click via the panel on the right.
                            </p>
                        </div>
                        <a href="{{ route('admin.backup.export.json') }}" 
                           download="globaltronics_cms_backup_{{ date('Y-m-d') }}.json"
                           class="px-4 py-2 bg-[#0047ba] hover:bg-blue-600 text-white text-xs font-bold uppercase rounded-lg transition-colors shadow-md flex items-center gap-1.5 shrink-0 ml-3">
                            <i class="fa-solid fa-download"></i>
                            <span>Export JSON</span>
                        </a>
                    </div>

                    <!-- Option B: MySQL Dump for phpMyAdmin -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-server text-cyan-400"></i>
                                <span>Hostinger MySQL Dump (.sql)</span>
                            </p>
                            <p class="text-xs text-slate-400 mt-0.5">
                                Pre-formatted SQL commands ready to import into Hostinger's phpMyAdmin.
                            </p>
                        </div>
                        <a href="{{ route('admin.backup.export.sql') }}" 
                           download="globaltronics_mysql_backup_{{ date('Y-m-d') }}.sql"
                           class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-xs font-bold uppercase rounded-lg transition-colors border border-slate-600 flex items-center gap-1.5 shrink-0 ml-3">
                            <i class="fa-solid fa-file-export"></i>
                            <span>Export SQL</span>
                        </a>
                    </div>

                    <!-- Option C: Raw SQLite -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-database text-emerald-400"></i>
                                <span>SQLite File (.sqlite)</span>
                            </p>
                            <p class="text-xs text-slate-400 mt-0.5">
                                Exact copy of active database. Drop directly into Hostinger if using SQLite.
                            </p>
                        </div>
                        <a href="{{ route('admin.backup.download.sqlite') }}" 
                           download="globaltronics_db_backup_{{ date('Y-m-d') }}.sqlite"
                           class="px-4 py-2 bg-slate-700 hover:bg-slate-600 text-white text-xs font-bold uppercase rounded-lg transition-colors border border-slate-600 flex items-center gap-1.5 shrink-0 ml-3">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Save SQLite</span>
                        </a>
                    </div>

                    <!-- Option D: Uploaded Media Archive -->
                    <div class="p-4 rounded-xl bg-slate-800/60 border border-slate-700/60 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-file-zipper text-rose-400"></i>
                                <span>Uploaded Media Archive (.zip)</span>
                            </p>
                            <p class="text-xs text-slate-400 mt-0.5">
                                Physical JPG/PNG/WebP image files uploaded via CMS (<code class="text-yellow-400 font-mono">public/uploads/</code>).
                            </p>
                        </div>
                        <a href="{{ route('admin.backup.export.media-zip') }}" 
                           download="globaltronics_media_uploads_{{ date('Y-m-d') }}.zip"
                           class="px-4 py-2 bg-rose-600/80 hover:bg-rose-600 text-white text-xs font-bold uppercase rounded-lg transition-colors border border-rose-500/40 flex items-center gap-1.5 shrink-0 ml-3 shadow-md">
                            <i class="fa-solid fa-file-zipper"></i>
                            <span>Download Media ZIP</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-3 bg-blue-950/40 border border-blue-800/40 rounded-xl text-xs text-blue-300">
                <i class="fa-solid fa-circle-check mr-1 text-emerald-400"></i>
                Every download also writes a permanent backup file to your local <code class="text-white bg-slate-900 px-1 py-0.5 rounded font-mono">backups/</code> folder!
            </div>
        </div>

        <!-- Panel 2: Import & Restore Data -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-600/20 text-emerald-400 flex items-center justify-center text-lg border border-emerald-500/30">
                        <i class="fa-solid fa-upload"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-black text-white uppercase tracking-wide">
                            Import / Restore Data
                        </h2>
                        <p class="text-xs text-slate-400">
                            Upload a previously exported JSON backup to sync or restore CMS records.
                        </p>
                    </div>
                </div>

                <form action="{{ route('admin.backup.import.json') }}" method="POST" enctype="multipart/form-data" class="space-y-4 my-6">
                    @csrf
                    
                    <div class="border-2 border-dashed border-slate-700 hover:border-[#0047ba] rounded-2xl p-6 text-center transition-colors bg-slate-950/40">
                        <i class="fa-solid fa-cloud-arrow-up text-3xl text-slate-500 mb-2"></i>
                        <p class="text-xs font-bold text-slate-300 mb-1">
                            Choose your <span class="text-yellow-400 font-mono">globaltronics_cms_backup_*.json</span> file
                        </p>
                        <p class="text-[10px] text-slate-500 mb-3">
                            Accepts .json backups from this CMS or from your local backups folder
                        </p>
                        <input type="file" name="backup_file" accept=".json" required
                               class="text-xs text-slate-400 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-[#0047ba] file:text-white hover:file:bg-blue-600 cursor-pointer">
                    </div>

                    <div class="p-3 bg-slate-800/80 border border-slate-700 rounded-xl text-[11px] text-slate-300 space-y-1">
                        <p class="font-bold text-white flex items-center gap-1.5">
                            <i class="fa-solid fa-arrows-rotate text-emerald-400"></i>
                            <span>Smart Non-Destructive Sync</span>
                        </p>
                        <p class="text-slate-400">
                            The import uses <code class="text-yellow-400 font-mono">updateOrCreate()</code>. Existing records matching IDs will be safely updated, and new records will be added without deleting other items.
                        </p>
                    </div>

                    <button type="submit" 
                            class="w-full py-3 bg-emerald-600 hover:bg-emerald-500 text-white font-black text-xs uppercase tracking-wider rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
                        <i class="fa-solid fa-file-import"></i>
                        <span>Restore / Sync CMS Data</span>
                    </button>
                </form>
            </div>

            <div class="p-3 bg-emerald-950/30 border border-emerald-800/30 rounded-xl text-xs text-emerald-300">
                <i class="fa-solid fa-shield-check mr-1 text-emerald-400"></i>
                Safely restores news, careers, solutions, and iPosters with transaction rollback protection.
            </div>
        </div>

    </div>

    <!-- Existing Local Backups Table -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 pb-4 border-b border-slate-800">
            <div>
                <h3 class="text-lg font-black text-white uppercase tracking-wide flex items-center gap-2">
                    <i class="fa-solid fa-box-archive text-yellow-400"></i>
                    <span>Files in Local Backups Folder ({{ count($localBackups) }})</span>
                </h3>
                <p class="text-xs text-slate-400 mt-0.5">
                    Saved in <code class="text-emerald-400 font-mono">{{ $stats['backups_folder'] }}</code>
                </p>
            </div>

            <form action="{{ route('admin.backup.open.folder') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-yellow-400 text-xs font-bold rounded-lg border border-slate-700 flex items-center gap-1.5 transition-colors">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    <span>Reveal in File Explorer</span>
                </button>
            </form>
        </div>

        @if(empty($localBackups))
            <div class="text-center py-8 text-slate-500 text-xs">
                <i class="fa-solid fa-folder-open text-3xl mb-2 text-slate-600"></i>
                <p>No backups generated yet. Click "Export JSON" or "Export SQL" above to generate your first backup.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-800 text-slate-400 uppercase text-[10px] font-black tracking-wider">
                            <th class="py-3 px-4">Filename</th>
                            <th class="py-3 px-4">Type</th>
                            <th class="py-3 px-4">Size</th>
                            <th class="py-3 px-4">Date Saved</th>
                            <th class="py-3 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 font-medium">
                        @foreach($localBackups as $backup)
                            <tr class="hover:bg-slate-800/40 transition-colors">
                                <td class="py-3.5 px-4 text-white font-mono flex items-center gap-2">
                                    @if($backup['ext'] === 'json')
                                        <i class="fa-solid fa-file-code text-yellow-400 text-sm"></i>
                                    @elseif($backup['ext'] === 'sql')
                                        <i class="fa-solid fa-server text-cyan-400 text-sm"></i>
                                    @elseif($backup['ext'] === 'zip')
                                        <i class="fa-solid fa-file-zipper text-rose-400 text-sm"></i>
                                    @else
                                        <i class="fa-solid fa-database text-emerald-400 text-sm"></i>
                                    @endif
                                    <span>{{ $backup['name'] }}</span>
                                </td>
                                <td class="py-3.5 px-4">
                                    <span class="px-2 py-0.5 rounded text-[10px] font-black uppercase tracking-wider
                                        {{ $backup['ext'] === 'json' ? 'bg-yellow-400/20 text-yellow-400' : '' }}
                                        {{ $backup['ext'] === 'sql' ? 'bg-cyan-400/20 text-cyan-400' : '' }}
                                        {{ $backup['ext'] === 'zip' ? 'bg-rose-400/20 text-rose-400' : '' }}
                                        {{ $backup['ext'] === 'sqlite' ? 'bg-emerald-400/20 text-emerald-400' : '' }}">
                                        .{{ $backup['ext'] }}
                                    </span>
                                </td>
                                <td class="py-3.5 px-4 text-slate-300 font-mono">{{ $backup['size'] }}</td>
                                <td class="py-3.5 px-4 text-slate-400">{{ $backup['date'] }}</td>
                                <td class="py-3.5 px-4 text-right space-x-1.5 whitespace-nowrap">
                                    <a href="{{ route('admin.backup.download.file', $backup['name']) }}" 
                                       download="{{ $backup['name'] }}"
                                       class="px-2.5 py-1.5 bg-blue-600/20 hover:bg-blue-600 text-blue-400 hover:text-white rounded-lg transition-colors inline-flex items-center gap-1 font-bold">
                                        <i class="fa-solid fa-download"></i>
                                        <span>Download</span>
                                    </a>
                                    <form action="{{ route('admin.backup.delete.file', $backup['name']) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this backup file? This cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 bg-rose-600/20 hover:bg-rose-600 text-rose-400 hover:text-white rounded-lg transition-colors inline-flex items-center gap-1 font-bold">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Hostinger Deployment & Data Safety Guide Card -->
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 sm:p-8 space-y-6">
        <div class="flex items-center space-x-3 pb-4 border-b border-slate-800">
            <div class="w-10 h-10 rounded-xl bg-yellow-500/20 text-yellow-400 flex items-center justify-center text-lg border border-yellow-500/30">
                <i class="fa-solid fa-server"></i>
            </div>
            <div>
                <h3 class="text-lg font-black text-white uppercase tracking-wide">
                    Hostinger Deployment & Safe Updates Guide
                </h3>
                <p class="text-xs text-slate-400">
                    How to upload to Hostinger without losing any CMS data or uploaded photos.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs text-slate-300">
            
            <!-- Question 1 Answer -->
            <div class="p-5 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-3">
                <h4 class="text-sm font-black text-yellow-300 uppercase tracking-wide flex items-center gap-2">
                    <i class="fa-solid fa-circle-question"></i>
                    <span>1. Can I export CMS data and import it on Hostinger?</span>
                </h4>
                <p class="leading-relaxed text-slate-300">
                    <strong class="text-emerald-400">YES, 100%!</strong> You have convenient options:
                </p>
                <ul class="space-y-2 text-slate-400">
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-check text-emerald-400 mt-0.5"></i>
                        <span><strong>Using SQLite (Easiest):</strong> Simply upload the whole project including <code class="text-white bg-slate-900 px-1 py-0.5 rounded">database/database.sqlite</code> to Hostinger. Everything will be online instantly with zero import needed.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-check text-cyan-400 mt-0.5"></i>
                        <span><strong>Using MySQL (phpMyAdmin):</strong> Click <em>"Export SQL"</em> above to download the <code class="text-white bg-slate-900 px-1 py-0.5 rounded">.sql</code> file, then go to Hostinger hPanel &rarr; Databases &rarr; phpMyAdmin &rarr; Import.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-check text-yellow-400 mt-0.5"></i>
                        <span><strong>Using This CMS Panel:</strong> Log into your live CMS on Hostinger, navigate to this page, and upload the <code class="text-white bg-slate-900 px-1 py-0.5 rounded">.json</code> file.</span>
                    </li>
                </ul>
            </div>

            <!-- Question 2 Answer -->
            <div class="p-5 rounded-2xl bg-slate-800/40 border border-slate-700/60 space-y-3">
                <h4 class="text-sm font-black text-yellow-300 uppercase tracking-wide flex items-center gap-2">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>2. Will uploading the website delete recently uploaded CMS data?</span>
                </h4>
                <p class="leading-relaxed text-slate-300">
                    <strong class="text-emerald-400">NO, your live data will stay the same</strong> provided you follow these two simple rules:
                </p>
                <ul class="space-y-2 text-slate-400">
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-triangle-exclamation text-amber-400 mt-0.5"></i>
                        <span><strong>Rule 1 - Never run migrate:fresh:</strong> On Hostinger, only run <code class="text-white bg-slate-900 px-1 py-0.5 rounded">php artisan migrate</code> (which only adds new tables). Never run <code class="text-rose-400 bg-slate-900 px-1 py-0.5 rounded">migrate:fresh</code> because it wipes all existing database rows.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i class="fa-solid fa-folder-closed text-blue-400 mt-0.5"></i>
                        <span><strong>Rule 2 - Protect the Uploads & Database folders:</strong> When uploading future code changes via FTP or Hostinger File Manager, do <strong>NOT</strong> overwrite:
                            <div class="mt-1 space-y-0.5">
                                <div>&bull; <code class="text-white bg-slate-900 px-1 py-0.5 rounded">public/uploads/</code> (stores all photos uploaded by staff)</div>
                                <div>&bull; <code class="text-white bg-slate-900 px-1 py-0.5 rounded">database/database.sqlite</code> (stores all live data)</div>
                            </div>
                        </span>
                    </li>
                </ul>
            </div>

        </div>

    </div>

</div>

<script>
function copyBackupsPath() {
    const pathText = document.getElementById('backups-path-text').innerText;
    navigator.clipboard.writeText(pathText).then(() => {
        const btn = document.getElementById('copy-path-btn');
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="fa-solid fa-check text-emerald-400"></i><span>Copied!</span>';
        setTimeout(() => btn.innerHTML = orig, 2000);
    });
}
</script>
@endsection
