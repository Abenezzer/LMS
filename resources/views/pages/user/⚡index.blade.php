<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <div class="space-y-6">

  <!-- 1. Header & Quick Actions -->
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
      <h1 class="text-2xl font-bold tracking-tight">User Management</h1>
      <p class="text-sm text-base-content/70">Manage user accounts, roles, and permissions.</p>
    </div>
    <div>
      <!-- Create User Modal Trigger -->
      <button onclick="user_modal.showModal()" class="btn btn-primary gap-2 w-full sm:w-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
        </svg>
        Add New User
      </button>
    </div>
  </div>

  <!-- 2. User Stats Row -->
  <div class="stats shadow-sm bg-base-100 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 border border-base-200">
    <div class="stat">
      <div class="stat-figure text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
      </div>
      <div class="stat-title">Total Users</div>
      <div class="stat-value text-primary">1,248</div>
      <div class="stat-desc">↗︎ 12% from last month</div>
    </div>

    <div class="stat">
      <div class="stat-figure text-success">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      </div>
      <div class="stat-title">Active Now</div>
      <div class="stat-value text-success">1,180</div>
      <div class="stat-desc">94.5% active rate</div>
    </div>

    <div class="stat">
      <div class="stat-figure text-warning">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
      </div>
      <div class="stat-title">Pending Invites</div>
      <div class="stat-value text-warning">45</div>
      <div class="stat-desc">Awaiting verification</div>
    </div>

    <div class="stat">
      <div class="stat-figure text-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-8 h-8 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" /></svg>
      </div>
      <div class="stat-title">Suspended</div>
      <div class="stat-value text-secondary">23</div>
      <div class="stat-desc">Requires review</div>
    </div>
  </div>

  <!-- 3. Search & Filter Section -->
  <div class="card bg-base-100 border border-base-200 shadow-sm">
    <div class="card-body p-4">
      <form method="GET" action="" class="flex flex-col sm:flex-row gap-3 items-center justify-between">
        <div class="flex flex-col sm:flex-row gap-2 w-full md:w-auto flex-1">
          <!-- Search Input -->
          <label class="input input-bordered flex items-center gap-2 w-full max-w-xs input-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
            <input type="text" name="search" class="grow" placeholder="Search name or email..." value="{{ request('search') }}" />
          </label>

          <!-- Role Filter Dropdown -->
          <select name="role" class="select select-bordered select-sm w-full max-w-xs">
            <option value="">All Roles</option>
            <option value="admin">Administrator</option>
            <option value="editor">Editor</option>
            <option value="user">User</option>
          </select>

          <button type="submit" class="btn btn-neutral btn-sm">Filter</button>
        </div>

        <div class="text-xs text-base-content/60 self-end sm:self-center">
          Showing <strong>1-10</strong> of <strong>1,248</strong> users
        </div>
      </form>
    </div>
  </div>

  <!-- 4. Data Table -->
  <div class="card bg-base-100 border border-base-200 shadow-sm">
    <div class="overflow-x-auto">
      <table class="table table-zebra w-full">
        <thead>
          <tr>
            <th>
              <label><input type="checkbox" class="checkbox checkbox-xs" /></label>
            </th>
            <th>User</th>
            <th>Role</th>
            <th>Status</th>
            <th>Joined Date</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr class="hover">
            <th>
              <label><input type="checkbox" class="checkbox checkbox-xs" /></label>
            </th>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar placeholder">
                  <div class="bg-neutral text-neutral-content rounded-full w-10">
                    <span>CG</span>
                  </div>
                </div>
                <div>
                  <div class="font-bold">Cy Ganderton</div>
                  <div class="text-xs opacity-50">cy.ganderton@example.com</div>
                </div>
              </div>
            </td>
            <td><span class="badge badge-primary badge-sm">Administrator</span></td>
            <td><span class="badge badge-success badge-xs gap-1">Active</span></td>
            <td>Aug 12, 2026</td>
            <td class="text-right">
              <div class="join">
                <button class="btn btn-ghost btn-xs join-item text-info" title="Edit User">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
                </button>
                <button class="btn btn-ghost btn-xs join-item text-error" title="Delete User">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr class="hover">
            <th>
              <label><input type="checkbox" class="checkbox checkbox-xs" /></label>
            </th>
            <td>
              <div class="flex items-center gap-3">
                <div class="avatar placeholder">
                  <div class="bg-neutral text-neutral-content mask mask-squircle w-10 h-10">
                    <span class="text-xs">CS</span>
                  </div>
                </div>
                <div>
                  <div class="font-bold">Carroll Swaniawski</div>
                  <div class="text-xs opacity-50">carroll@example.com</div>
                </div>
              </div>
            </td>
            <td><span class="badge badge-ghost badge-sm">Editor</span></td>
            <td><span class="badge badge-warning badge-sm">Pending</span></td>
            <td>Feb 04, 2026</td>
            <td class="text-right">
              <div class="join">
                <button class="btn btn-ghost btn-xs join-item text-info" title="Edit User">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  </svg>
                </button>
                <button class="btn btn-ghost btn-xs join-item text-error" title="Delete User">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Laravel Pagination Footer -->
    <div class="card-body p-4 border-t border-base-200 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-base-content/70">
      <div>
        Showing <span class="font-semibold text-base-content">1</span> to <span class="font-semibold text-base-content">10</span> of <span class="font-semibold text-base-content">97</span> results
      </div>

      <div class="join">
        <button class="join-item btn btn-sm btn-outline" disabled>« Previous</button>
        <button class="join-item btn btn-sm btn-outline btn-active">1</button>
        <button class="join-item btn btn-sm btn-outline">2</button>
        <button class="join-item btn btn-sm btn-outline">3</button>
        <button class="join-item btn btn-sm btn-outline">Next »</button>
      </div>
    </div>
  </div>

</div>

<!-- DaisyUI Create User Modal -->
<dialog id="user_modal" class="modal">
  <div class="modal-box">
    <h3 class="font-bold text-lg mb-4">Add New User</h3>
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <form class="space-y-4">
      <div class="form-control">
        <label class="label"><span class="label-text">Full Name</span></label>
        <input type="text" placeholder="John Doe" class="input input-bordered w-full" required />
      </div>
      <div class="form-control">
        <label class="label"><span class="label-text">Email Address</span></label>
        <input type="email" placeholder="john@example.com" class="input input-bordered w-full" required />
      </div>
      <div class="form-control">
        <label class="label"><span class="label-text">Role</span></label>
        <select class="select select-bordered w-full">
          <option value="user">User</option>
          <option value="editor">Editor</option>
          <option value="admin">Administrator</option>
        </select>
      </div>
      <div class="modal-action">
        <form method="dialog">
          <button class="btn btn-ghost">Cancel</button>
        </form>
        <button type="submit" class="btn btn-primary">Save User</button>
      </div>
    </form>
  </div>
</dialog>
</div>