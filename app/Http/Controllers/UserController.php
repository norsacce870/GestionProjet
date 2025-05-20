<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of the users. 
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('user.index', compact('users'));
    }

    // Show the form for creating a new user.
    public function create()
    {
        return view('user.create');
    }

    // Store a newly created user in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        if ($request->hasFile('image')) {
            $user->addMediaFromRequest('image')
                ->toMediaCollection('image');
        }

        return redirect()->route('user.index')->with('success', 'Utilisateur créé avec succès.');
    }

    // Display the specified user.
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    // Show the form for editing the specified user.
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    // Update the specified user in storage.
   public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    if (!empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']);
    }

    $user->update($validated);

    return redirect()->route('user.index')->with('success', 'Utilisateur mis à jour avec succès.');
}

    // Remove the specified user from storage.
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
