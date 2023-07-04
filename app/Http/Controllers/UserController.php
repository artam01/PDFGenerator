<?php

namespace App\Http\Controllers;

use App\Exports\ExportUsers;
use App\Imports\UsersImport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }

    public function import_users(Request $request)
    {
        $file = $request->file('file');

        try {
            Excel::import(new UsersImport, $file);

            // Optionally, you can add a success message or redirect the user to a specific page.
            return redirect()->back()->with('success', 'Users imported successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the import process.
            return redirect()->back()->with('error', 'An error occurred during user import.');
        }
    }

    public function export_users()
    {
        return Excel::download(new ExportUsers(), 'users.xlsx');
    }

    public function export_users_pdf()
    {
        $users = User::all();

        $pdf = PDF::loadView('pdf.users', ['users' => $users]);

        return $pdf->download('users.pdf');

    }
}
