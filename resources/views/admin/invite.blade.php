@extends('layouts.dashboard')

@section('title', 'Invite Member - Ink & Paper')

@section('page-content')
    <div class="max-w-[800px] mx-auto">
        <!-- Back Action (Transactional Header) -->
        <div class="mb-8">
            <button
                class="flex items-center gap-2 text-on-surface-variant hover:text-primary transition-colors font-ui-label text-ui-label group">
                <span class="material-symbols-outlined group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Back to Team Dashboard
            </button>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left: Form -->
            <div class="lg:col-span-7">
                <header class="mb-10">
                    <h1 class="font-display-lg text-headline-md mb-2">Invite a collaborator</h1>
                    <p class="text-on-surface-variant font-body-md opacity-80">Expand your workspace by bringing in experts
                        and colleagues.</p>
                </header>
                <form class="space-y-8" id="invite-form">
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label class="font-ui-label text-ui-label text-on-surface block" for="email">Email
                            Address</label>
                        <input
                            class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface font-ui-label custom-input-focus transition-all"
                            id="email" placeholder="name@company.com" required="" type="email" />
                    </div>
                    <!-- Role Selection -->
                    <div class="space-y-4">
                        <label class="font-ui-label text-ui-label text-on-surface block">Assign Role</label>
                        <div class="grid grid-cols-1 gap-3">
                            <!-- Admin Role -->
                            <label
                                class="relative flex items-start p-4 border border-outline-variant rounded-lg cursor-pointer hover:bg-surface-container-low transition-colors group">
                                <input class="mt-1 text-primary focus:ring-primary border-outline-variant" name="role"
                                    type="radio" value="admin" />
                                <div class="ml-4">
                                    <span class="block font-ui-label text-ui-label text-on-surface">Admin</span>
                                    <span class="block text-metadata font-metadata text-on-surface-variant mt-1">Full access
                                        to settings, billing, and member management.</span>
                                </div>
                            </label>
                            <!-- Editor Role -->
                            <label
                                class="relative flex items-start p-4 border border-primary bg-primary/5 rounded-lg cursor-pointer transition-colors group">
                                <input checked="" class="mt-1 text-primary focus:ring-primary border-primary"
                                    name="role" type="radio" value="editor" />
                                <div class="ml-4">
                                    <span class="block font-ui-label text-ui-label text-on-surface">Editor</span>
                                    <span class="block text-metadata font-metadata text-on-surface-variant mt-1">Can
                                        publish, edit all articles, and manage creators.</span>
                                </div>
                            </label>
                            <!-- Author Role -->
                            <label
                                class="relative flex items-start p-4 border border-outline-variant rounded-lg cursor-pointer hover:bg-surface-container-low transition-colors group">
                                <input class="mt-1 text-primary focus:ring-primary border-outline-variant" name="role"
                                    type="radio" value="author" />
                                <div class="ml-4">
                                    <span class="block font-ui-label text-ui-label text-on-surface">Author</span>
                                    <span class="block text-metadata font-metadata text-on-surface-variant mt-1">Limited to
                                        creating and editing their own articles.</span>
                                </div>
                            </label>
                        </div>
                    </div>
                    <!-- Personal Message -->
                    <div class="space-y-2">
                        <label class="font-ui-label text-ui-label text-on-surface block" for="message">Personal Message
                            <span class="text-on-surface-variant opacity-50">(Optional)</span></label>
                        <textarea
                            class="w-full px-4 py-3 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface font-ui-label custom-input-focus transition-all resize-none"
                            id="message" placeholder="Hey! Excited to have you on board with the new project..." rows="4"></textarea>
                    </div>
                    <!-- Submit Action -->
                    <div class="pt-4 flex flex-col sm:flex-row gap-4">
                        <button
                            class="bg-primary-container text-white px-8 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 transition-all shadow-sm"
                            type="submit">
                            Send Invitation
                        </button>
                        <button
                            class="border border-secondary text-on-surface px-8 py-3 rounded-lg font-ui-button text-ui-button hover:bg-surface-container transition-all"
                            type="button">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
            <!-- Right: Visual/Context Bento Card -->
            <div class="lg:col-span-5 flex flex-col gap-6">
                <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-xl p-8 shadow-sm">
                    <div class="aspect-square rounded-lg mb-8 overflow-hidden bg-surface-container relative">
                        <img class="w-full h-full object-cover grayscale brightness-95 contrast-105"
                            data-alt="A clean and professional workspace featuring a team collaborating around a large wooden table in a minimalist studio. The lighting is soft and natural, emphasizing a high-contrast ink and paper aesthetic. The room is filled with white walls and sleek charcoal furniture, creating a focused and serene environment. The composition highlights teamwork and intellectual focus in a digital quiet setting."
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuxMgOTyMAcW0UTEJBR_qHT1-jcn4N-w_mE8_WdTnmMczgGWCja4nCdsPAKNPWo0GMoMfzDuVJ7x9A1fLXUAcYGaEnAFn7QNN1On9bcLblqTUa4Mq739My2oo5VJluc4Tx_h7ar7v9uqOsE6jTVhBuqAtg0aV1D23SEvPdSxTHI5qS7PZEt_B2bkJIggCQRFjJR3SHjJisJ17Cos-S2JIy4T23brIvwFWCD9rigm86rBL0sKF_qH7yY5Jy-IDkB0Y_vvu2j0sVmFY" />
                        <div class="absolute inset-0 bg-primary/5 mix-blend-multiply"></div>
                    </div>
                    <h3 class="font-ui-label text-ui-label text-on-surface mb-4">Workspace Statistics</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-outline-variant/30">
                            <span class="text-metadata font-metadata text-on-surface-variant">Active Seats</span>
                            <span class="text-metadata font-metadata font-bold">12 / 20</span>
                        </div>
                        <div class="flex justify-between items-center pb-3 border-b border-outline-variant/30">
                            <span class="text-metadata font-metadata text-on-surface-variant">Pending Invites</span>
                            <span class="text-metadata font-metadata font-bold">3</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-metadata font-metadata text-on-surface-variant">Plan</span>
                            <span class="text-metadata font-metadata font-bold text-primary">Enterprise Platinum</span>
                        </div>
                    </div>
                </div>
                <div class="bg-primary-container text-on-primary-container rounded-xl p-6 relative overflow-hidden group">
                    <div class="relative z-10">
                        <span class="material-symbols-outlined text-4xl mb-4">auto_awesome</span>
                        <h4 class="font-headline-md text-ui-label mb-2">Collaboration Matters</h4>
                        <p class="text-metadata opacity-90 leading-relaxed">Inviting members gives them instant access to
                            your shared library, draft reviews, and real-time editing tools.</p>
                    </div>
                    <div
                        class="absolute -right-8 -bottom-8 opacity-10 group-hover:scale-110 transition-transform duration-700">
                        <span class="material-symbols-outlined text-[120px]">group</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
