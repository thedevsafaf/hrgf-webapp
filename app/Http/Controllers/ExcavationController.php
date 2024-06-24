<?php
namespace App\Http\Controllers;

use App\Models\Excavation;
use App\Models\Order;
use App\Rules\NineDigitOrderId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ExcavationController extends Controller
{

    public function index(Request $request)
    {

        $query = Excavation::query();

        // Check if a search query parameter exists
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->whereHas('order', function ($query) use ($searchTerm) {
                $query->where('order_id', 'like', '%' . $searchTerm . '%');
            });
        }

        // Paginate with 10 records per page (adjust as needed)
        $excavations = $query->paginate(5);
        return view('excavations.index', compact('excavations'));
    }


    public function create()
    {
        return view('excavations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'engineer' => 'required',
            'order_id' => ['required', 'integer', new NineDigitOrderId],
            'company' => 'required',
            'location' => 'required',
            'nature_of_work' => 'required',
            'images' => 'nullable|image',
            'documents' => 'nullable|file',
        ]);

        // Find or create the Order
        $order = Order::firstOrCreate(['order_id' => $request->order_id]);

        // Create the Excavation under this Order
        $excavation = new Excavation();
        $excavation->engineer = $request->engineer;
        $excavation->note = $request->note;
        $excavation->company = $request->company;
        $excavation->location = $request->location;
        $excavation->nature_of_work = $request->nature_of_work;

        if ($request->hasFile('images')) {
            $excavation->images = $request->file('images')->store('images', 'public');
        }

        if ($request->hasFile('documents')) {
            $excavation->documents = $request->file('documents')->store('documents', 'public');
        }

        // Associate the Excavation with the Order
        $order->excavations()->save($excavation);

        return redirect()->route('excavations.index')->with('success', 'Excavation record created successfully.');
    }


    public function show(Excavation $excavation)
    {
        return view('excavations.show', compact('excavation'));
    }

    public function edit(Excavation $excavation)
    {
        return view('excavations.edit', compact('excavation'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'engineer' => 'required',
            'order_id' => ['required', 'integer', new NineDigitOrderId],
            'company' => 'required',
            'location' => 'required',
            'nature_of_work' => 'required',
            'images' => 'nullable|image',
            'documents' => 'nullable|file',
        ]);

        // Retrieve the excavation record from the database
        $excavation = Excavation::findOrFail($id);

        $excavation->engineer = $request->engineer;
        $excavation->note = $request->note;
        $excavation->company = $request->company;
        $excavation->location = $request->location;
        $excavation->nature_of_work = $request->nature_of_work;

        if ($request->hasFile('images')) {
            if ($excavation->images) {
                Storage::disk('public')->delete($excavation->images);
            }
            $excavation->images = $request->file('images')->store('images', 'public');
        }

        if ($request->hasFile('documents')) {
            if ($excavation->documents) {
                Storage::disk('public')->delete($excavation->documents);
            }
            $excavation->documents = $request->file('documents')->store('documents', 'public');
        }

        // Update the associated Order ID if necessary
        if ($request->order_id !== $excavation->order->order_id) {
            $order = Order::firstOrCreate(['order_id' => $request->order_id]);
            $excavation->order()->associate($order);
        }

        $excavation->save();

        return redirect()->route('excavations.index')->with('success', 'Excavation record updated successfully.');
    }

    public function destroy($id)
    {

        // Retrieve the excavation record from the database
        $excavation = Excavation::findOrFail($id);

        if ($excavation->images) {
            Storage::disk('public')->delete($excavation->images);
        }

        if ($excavation->documents) {
            Storage::disk('public')->delete($excavation->documents);
        }

        $excavation->delete();

        return redirect()->route('excavations.index')->with('success', 'Excavation record deleted successfully.');
    }
}
