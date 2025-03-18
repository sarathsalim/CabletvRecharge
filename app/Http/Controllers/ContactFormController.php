<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactform;

class ContactFormController extends Controller
{
    // Show the contact form
    public function showForm()
    {
        return view('contact');
    }

    // Store the form data
    public function storeForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Store the data in the database
        ContactForm::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    public function viewSubmissions()
    {
        $contacts = Contactform::paginate(10); // Paginate results (10 per page)
        return view('admin.viewcontactform', compact('contacts'));
    }

    // Delete a submission
    public function deleteSubmission($id)
    {
        // Find the contact form submission by ID and delete it
        $contact = Contactform::find($id);
        
        if ($contact) {
            $contact->delete();
            return redirect()->route('contacts.view')->with('success', 'Submission deleted successfully!');
        }

        return redirect()->route('contacts.view')->with('error', 'Submission not found!');
    }

}
