<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CreditCardService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CreditCardController extends Controller
{

    protected CreditCardService $service;
    public function __construct()
    {
        $this->service = new CreditCardService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view("modules.credit_card.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("modules.credit_card.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $card = $this->service->getById($id);
        return view("modules.credit_card.edit", compact("card"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $deleted = $this->service->delete($id);

        if ($deleted) {
            return redirect()->back()->with('success', 'Credit card deleted successfully.');
        }
        return redirect()->back()->with('error', 'Failed to delete credit card.');
    }
}
