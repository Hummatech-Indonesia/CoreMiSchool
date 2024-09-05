<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\GuestBookInterface;
use App\Models\GuestBook;
use App\Http\Requests\StoreGuestBookRequest;
use App\Http\Requests\UpdateGuestBookRequest;

class GuestBookController extends Controller
{
    private GuestBookInterface $guestBook;

    public function __construct(GuestBookInterface $guestBook)
    {
        $this->guestBook = $guestBook;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guestBooks = $this->guestBook->get();
        return view('', compact('guestBooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.pages.guest-book.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestBookRequest $request)
    {
        $this->guestBook->store($request->validated());
        return redirect()->back()->with('success', 'Berhasil menambah data.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GuestBook $guestBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuestBook $guestBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestBookRequest $request, GuestBook $guestBook)
    {
        $this->guestBook->update($guestBook->id, $request->validated());
        return redirect()->back()->with('success', 'Berhasil mengupdate data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestBook $guestBook)
    {
        $this->guestBook->delete($guestBook->id);
        return redirect()->back()->with('success', 'Berhasil menghapus data.');
    }
}
