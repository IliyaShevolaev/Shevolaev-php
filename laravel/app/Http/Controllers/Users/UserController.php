<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\View\View;
use App\Services\Users\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->authorize('view users');

        $allUsersData = $this->userService->all();

        return view('users.index', compact('allUsersData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->authorize('add users');

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $storeRequest): RedirectResponse
    {
        $this->authorize('add users');

        $userData = $storeRequest->validated();

        $this->userService->store($userData);

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $this->authorize('edit users');

        $userRoleName = $user->getUserRoleName();
        
        return view('users.edit', compact('user', 'userRoleName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $updateRequest, User $user): RedirectResponse
    {
        $this->authorize('edit users');

        $userData = $updateRequest->validated();

        $this->userService->update($userData, $user);

        return redirect()->route('users.index');
    }
}
