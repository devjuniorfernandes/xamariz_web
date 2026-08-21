<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactLead;
use Illuminate\Http\Request;

class ContactLeadController extends Controller
{
    public function index()
    {
        $leads = ContactLead::latest()->paginate(15);
        return view('admin.contact_leads.index', compact('leads'));
    }

    public function show(ContactLead $contactLead)
    {
        if ($contactLead->status === 'new') {
            $contactLead->update(['status' => 'in_progress']);
        }
        return view('admin.contact_leads.show', compact('contactLead'));
    }

    public function update(Request $request, ContactLead $contactLead)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,closed',
            'notes' => 'nullable|string',
        ]);

        $contactLead->update($validated);

        return redirect()->route('admin.contact-leads.show', $contactLead)->with('success', 'Estado da mensagem atualizado.');
    }

    public function destroy(ContactLead $contactLead)
    {
        $contactLead->delete();
        return redirect()->route('admin.contact-leads.index')->with('success', 'Mensagem eliminada.');
    }
}
