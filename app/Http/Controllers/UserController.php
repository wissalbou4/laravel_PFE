<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Fetch all users.
     */
    public function index(Request $request)
    {
        // Ensure only users with the 'administratif' role can access this endpoint
        if ($request->user()->role !== 'administratif') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Fetch all users
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Create a new user.
     */
    public function store(Request $request)
    {
        // Ensure only users with the 'administratif' role can access this endpoint
        if ($request->user()->role !== 'administratif') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:medcin,secretaire,administratif',
        ]);

        // Create the user
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'image' => 'no_image.jpg', // Default image
                'status' => 1, // Default status
            ]);

            return response()->json([
                'message' => 'User created successfully',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating user',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Update a user.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8',
            'role' => 'sometimes|in:medcin,secretaire,administratif',
        ]);

        // Find the user
        $user = User::findOrFail($id);

        // Update the user
        $user->update($request->only(['name', 'email', 'password', 'role']));

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }

    /**
     * Delete a user.
     */
    public function destroy($id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }
}