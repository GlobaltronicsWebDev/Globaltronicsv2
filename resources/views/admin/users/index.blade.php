@extends('admin.layouts.admin')

@section('title', 'User Accounts & Security | Globaltronics CMS')

@section('header-title', 'User Accounts & Security')
@section('header-subtitle', 'Manage administrator and staff login accounts, roles, and security credentials.')

@section('content')
<div class="space-y-8">

    <!-- Top Security Overview Banner -->
    <div class="p-6 rounded-2xl bg-white border border-slate-200/90 shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-200 text-[#0047ba] flex items-center justify-center text-xl shadow-sm">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div>
                <h3 class="text-base font-bold text-slate-900">Role-Based Access & Security</h3>
                <p class="text-xs text-slate-500 mt-0.5 font-medium">
                    As an Administrator, you have full authority to reset and update passwords for all CMS accounts.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-bold">
                <i class="fa-solid fa-circle-check text-[11px] text-emerald-600"></i>
                <span>{{ $users->count() }} Active Accounts</span>
            </span>
        </div>
    </div>

    <!-- Accounts Grid / Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($users as $user)
            <div class="bg-white rounded-2xl border border-slate-200 p-6 sm:p-7 shadow-sm hover:shadow-md hover:border-blue-300 transition-all flex flex-col justify-between">
                <div>
                    <!-- Header with Role Badge -->
                    <div class="flex items-center justify-between gap-3 mb-5">
                        <div class="flex items-center space-x-3.5">
                            <div class="w-12 h-12 rounded-xl {{ $user->isAdmin() ? 'bg-gradient-to-tr from-[#0047ba] to-blue-600 shadow-blue-500/20 ring-blue-400/30' : ($user->role === 'sales' ? 'bg-gradient-to-tr from-amber-500 to-amber-600 shadow-amber-500/20 ring-amber-400/30' : 'bg-gradient-to-tr from-purple-600 to-indigo-600 shadow-purple-500/20 ring-purple-400/30') }} flex items-center justify-center font-bold text-xl text-white-force shadow-sm ring-2">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-slate-900 leading-tight">
                                    {{ $user->name }}
                                </h4>
                                <p class="text-xs text-slate-500 mt-0.5 font-mono font-medium">
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>

                        <span class="inline-block text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded-lg {{ $user->isAdmin() ? 'bg-blue-50 text-blue-700 border border-blue-200' : ($user->role === 'sales' ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-purple-50 text-purple-700 border border-purple-200') }}">
                            {{ $user->role_title }}
                        </span>
                    </div>

                    <!-- Role Permissions Summary -->
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 mb-5 text-xs space-y-1.5">
                        <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block mb-1">Assigned Scope:</span>
                        @if($user->isAdmin())
                            <div class="flex items-center gap-2 text-emerald-700 font-semibold">
                                <i class="fa-solid fa-circle-check text-[11px] text-emerald-600"></i>
                                <span>Full Control: News, Solutions, iPosters, Inquiries, Careers, & Backups</span>
                            </div>
                        @elseif($user->role === 'sales')
                            <div class="flex items-center gap-2 text-amber-800 font-semibold">
                                <i class="fa-solid fa-circle-check text-[11px] text-amber-600"></i>
                                <span>Dedicated Access: Client Inquiries, Quote Requests, & Sales Notes</span>
                            </div>
                        @else
                            <div class="flex items-center gap-2 text-purple-700 font-semibold">
                                <i class="fa-solid fa-circle-check text-[11px] text-purple-600"></i>
                                <span>Dedicated Access: Careers, Job Postings, & Applications</span>
                            </div>
                        @endif
                    </div>

                    <!-- Meta Details -->
                    <div class="space-y-2 text-xs mb-6">
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="font-medium text-slate-500">Account ID:</span>
                            <span class="font-mono font-bold text-slate-800">#{{ $user->id }}</span>
                        </div>
                        <div class="flex justify-between py-1.5 border-b border-slate-100">
                            <span class="font-medium text-slate-500">Created:</span>
                            <span class="font-semibold text-slate-800">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'System Default' }}</span>
                        </div>
                        <div class="flex justify-between py-1.5">
                            <span class="font-medium text-slate-500">Password Last Changed:</span>
                            <span class="font-semibold text-slate-800">{{ $user->updated_at ? $user->updated_at->diffForHumans() : 'Never' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-4 border-t border-slate-100">
                    <button type="button" 
                            onclick="openPasswordModal({{ $user->id }}, '{{ addslashes($user->name) }}', '{{ addslashes($user->email) }}')"
                            class="w-full py-2.5 px-4 rounded-xl bg-slate-50 hover:bg-[#0047ba] text-slate-700 hover:text-white-force text-xs font-bold transition-all border border-slate-200 hover:border-[#0047ba] shadow-sm flex items-center justify-center gap-2 active:scale-95 group">
                        <i class="fa-solid fa-key text-amber-500 group-hover:text-yellow-300 transition-colors"></i>
                        <span>Change Password</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>

</div>

<!-- Password Change Modal -->
<div id="password-modal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm transition-all duration-200">
    <div class="bg-white border border-slate-200 rounded-2xl max-w-md w-full p-6 sm:p-7 shadow-2xl relative text-slate-800 animate-scale-up">
        
        <!-- Close Button -->
        <button type="button" onclick="closePasswordModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full flex items-center justify-center text-slate-400 hover:text-slate-700 hover:bg-slate-100 transition-colors">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- Modal Header -->
        <div class="flex items-center space-x-3 mb-5 pr-6">
            <div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-200 text-amber-600 flex items-center justify-center text-lg">
                <i class="fa-solid fa-key"></i>
            </div>
            <div>
                <h3 class="text-lg font-bold text-slate-900">Change Password</h3>
                <p id="modal-account-desc" class="text-xs text-slate-500 font-mono font-medium"></p>
            </div>
        </div>

        <!-- Form -->
        <form id="password-change-form" method="POST" action="" class="space-y-4">
            @csrf
            @method('PATCH')

            <!-- New Password -->
            <div>
                <label for="new_password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    New Password (Min. 8 Characters) <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="password" 
                           id="new_password" 
                           name="password" 
                           required 
                           minlength="8" 
                           placeholder="Enter new strong password" 
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all pr-10">
                    <button type="button" onclick="togglePasswordVisibility('new_password', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                        <i class="fa-regular fa-eye text-sm"></i>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="new_password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                    Confirm New Password <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="password" 
                           id="new_password_confirmation" 
                           name="password_confirmation" 
                           required 
                           minlength="8" 
                           placeholder="Confirm new password" 
                           class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#0047ba] focus:bg-white transition-all pr-10">
                    <button type="button" onclick="togglePasswordVisibility('new_password_confirmation', this)" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                        <i class="fa-regular fa-eye text-sm"></i>
                    </button>
                </div>
            </div>

            <!-- Bottom Actions -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <button type="button" onclick="closePasswordModal()" class="px-4 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-100 text-slate-600 text-xs font-semibold transition-all">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-[#0047ba] hover:bg-blue-700 text-white-force text-xs font-bold transition-all shadow-md shadow-blue-600/20 flex items-center gap-2 active:scale-95">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Update Password</span>
                </button>
            </div>
        </form>

    </div>
</div>

@push('scripts')
<script>
    function openPasswordModal(userId, userName, userEmail) {
        document.getElementById('modal-account-desc').innerText = userName + ' (' + userEmail + ')';
        const form = document.getElementById('password-change-form');
        form.action = '/admin/users/' + userId + '/password';
        
        document.getElementById('new_password').value = '';
        document.getElementById('new_password_confirmation').value = '';

        const modal = document.getElementById('password-modal');
        modal.classList.remove('hidden');
    }

    function closePasswordModal() {
        const modal = document.getElementById('password-modal');
        modal.classList.add('hidden');
    }

    function togglePasswordVisibility(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'fa-regular fa-eye-slash text-sm text-yellow-600';
        } else {
            input.type = 'password';
            icon.className = 'fa-regular fa-eye text-sm text-slate-400';
        }
    }

    window.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePasswordModal();
        }
    });
</script>
@endpush
@endsection
