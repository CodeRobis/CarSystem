<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Middleware\PermissionMiddleware;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Owner::class, 'owner');
    }

    public function index(Request $request)
    {
        $filter = $request->session()->get('filterOwners', (object)['name' => null, 'surname' => null]);

        $owners = Owner::filter($filter)->orderBy("name");

        if (auth()->user()->role == 'user') {
            $owners = $owners->where('user_id', auth()->id());
        }

        $owners = $owners->get();

        return view("owners.index", [
            "owners" => $owners,
            "filter" => $filter
        ]);
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|regex:/^[a-zA-Z]+$/',
            'surname' => 'nullable|regex:/^[a-zA-Z]+$/'
        ], [
            'name.regex' => __('messages.invalid_license_plate'),
            'surname.regex' => __('messages.invalid_surname')
        ]);

        $filterOwners = new \stdClass();
        $filterOwners->name = $request->name;
        $filterOwners->surname = $request->surname;

        $request->session()->put('filterOwners', $filterOwners);
        return redirect()->route('owners.index');
    }

    public function create()
    {
        $this->authorize('create', Owner::class);
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        // Ensure the owner is associated with the authenticated user
        $validatedData['user_id'] = auth()->id();

        Owner::create($validatedData);

        return redirect()->route('owners.index')->with('success', 'Owner created successfully.');
    }

    public function show(Owner $owner)
    {
        $this->authorize('view', $owner);
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        $this->authorize('update', $owner);
        return view('owners.edit', ['owner' => $owner]);
    }

    public function update(Request $request, Owner $owner)
    {
        $this->authorize('update', $owner);

        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $owner->update($validatedData);

        return redirect()->route('owners.index')->with('success', 'Owner updated successfully.');
    }

    public function destroy(Owner $owner)
    {
        $this->authorize('delete', $owner);
        $owner->delete();

        return redirect()->route('owners.index')->with('success', 'Owner deleted successfully.');
    }
}
