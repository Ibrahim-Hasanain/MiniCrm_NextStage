<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(StoreCompanyRequest $request)
    {
        try {

            $validatedData = $request->validated();

            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('public/logos');
            }

            $company = new Company([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'logo' => $logoPath ? Storage::url($logoPath) : null,
                'website' => $validatedData['website'],
            ]);
            $company->save();

            return redirect()->route('companies.index')->with('success', 'Company created successfully.');
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong. Please try again later.');
        }
    }

    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        try {

            $validatedData = $request->validated();

            if ($request->hasFile('logo')) {
                if (!empty($company->logo)) {
                    Storage::delete($company->logo);
                }
                $logoPath = $request->file('logo')->store('public/logos');
                $company->logo = Storage::url($logoPath);
            }

            $company->name = $validatedData['name'];
            $company->email = $validatedData['email'];
            $company->address = $validatedData['address'];
            $company->website = $validatedData['website'];
            $company->save();

            return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
        } catch (\Throwable $th) {
            abort(500, 'Something went wrong. Please try again later.');
        }
    }

    public function destroy(Company $company)
    {
        if (!empty($company->logo)) {
            Storage::delete($company->logo);
        }

        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
