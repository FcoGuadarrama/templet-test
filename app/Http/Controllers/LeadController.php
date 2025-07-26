<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Http\Resources\LeadResource;
use App\Models\Lead;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\View\View;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $leads = Lead::whereNull('deleted_at')->paginate(10);
        return view('leads.index', compact('leads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('leads.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LeadRequest $request): RedirectResponse
    {
        Lead::create($request->validated());

        return redirect()->route('leads.index')
            ->with('success', 'Lead created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function apiIndex(Request $request): AnonymousResourceCollection
    {
        $query = Lead::whereNull('deleted_at');

        $query->when($request->email, function($q) use ($request) {
            return $q->where('email', 'like', "%{$request->email}%");
        })
            ->when($request->country, function($q) use ($request) {
                return $q->where('country', $request->country);
            });

        $leads = $query->get();

        return LeadResource::collection($leads);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead): View
    {
        return view('leads.edit', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LeadRequest $request, Lead $lead): RedirectResponse
    {
        $lead->update($request->validated());

        return redirect()->route('leads.index')
            ->with('success', 'Lead updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead): RedirectResponse
    {
        $lead->delete();

        return redirect()->route('leads.index')
            ->with('success', 'Lead deleted successfully!');
    }
}
