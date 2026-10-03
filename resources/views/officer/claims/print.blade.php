<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Slip</title>

    {{-- DO NOT EVEN THINK ABOUT REMOVING THIS. Or else :3 --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body { background: #ddd; }

        .sheet {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 20px auto;
            background: white;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
        }

        .toolbar {
            width: 210mm;
            margin: 20px auto;
        }

        @page { size: A4; margin: 0; }

        @media print {
            body   { background: white; }
            .sheet { margin: 0; box-shadow: none; min-height: auto; }
        }
    </style>
</head>
<body>
    <div class="toolbar d-print-none">
        <a href="{{ route('officer.dashboard') }}" class="btn btn-secondary d-print-none">Back to Dashboard</a>

        {{-- Thought of putting print button below instead to nudge officers to read it first to make sure its correct. But on second thought, we didn't implement a way to edit wrong claim yet, so I'm putting it here for now -n --}}
        <button onclick="window.print()" class="btn btn-primary d-print-none">Print</button>    
    </div>

    <div class="sheet">
        <h1 class="text-center">Claim Slip</h1>
        
        {{-- Item section --}}
        <h2 class="border-bottom pb-1 mt-4">Item</h2>
        <table class="table">
            <tr><th class="w-25">Item Name</th><td>{{ $claim->item->name }}</td></tr>
            <tr><th class="w-25">Date found</th><td>{{ $claim->item->date_found->format('l, d M Y') }}</td></tr>
            <tr><th class="w-25">Image</th><td><img src="{{ asset('storage/' . $claim->item->photo_path) }}" class="img-fluid w-25"></td></tr>
        </table>

        {{-- Claimant sections --}}
        <h2 class="border-bottom pb-1 mt-4">Claimant</h2>
        <table class="table">
            <tr><th class="w-25">Claimant Name</th><td>{{ $claim->claimant_name }}</td></tr>
            <tr><th class="w-25">Email</th><td>{{ $claim->email ?? '-' }}</td></tr>
            <tr><th class="w-25">Phone Number</th><td>{{ $claim->phone ?? '-' }}</td></tr>
            <tr><th class="w-25">NIM</th><td>{{ $claim->nim ?? '-' }}</td></tr>            
        </table>

        {{-- Handover Section --}}
        <h2 class="border-bottom pb-1 mt-4">Handover</h2>
        <table class="table">
            <tr><th class="w-25">Officer Name</th><td> {{ $claim->officer->name }}</td></tr>
            <tr><th class="w-25">Date Claimed</th><td> {{ $claim->claimed_at->format('l, d M Y, H:i') }}</td></tr>
        </table>

        {{-- Signature Section --}}
        <div class="d-flex justify-content-between mt-5">
            <div>
                <p>___________________________________</p>
                <p>Claimant: {{ $claim->claimant_name }}</p>
            </div>
            <div>
                <p>___________________________________</p>
                <p>Officer: {{ $claim->officer->name }}</p>
            </div>
        </div>
    </div>
</body>
</html>