<div class="row">
    <div class="form-group col-md-3">
        <strong>Posted Date:</strong> {{ $rtaFine->posted_date }}
    </div>

    <div class="form-group col-md-3">
        <strong>Fine Date:</strong> {{ $rtaFine->fine_date }}
    </div>

    <div class="form-group col-md-3">
        <strong>Ref .ID:</strong> {{ $rtaFine->ref_id }}
    </div>

    <div class="form-group col-md-3">
        <strong>Category:</strong> Vehicle
    </div>

    <div class="form-group col-md-3">
        <strong>Expense Head:</strong> Traffic Fine
    </div>

    <div class="form-group col-md-3">
        <strong>Surcharge Account:</strong> {{ $rtaFine->surcharge_account }}
    </div>

    <div class="form-group col-md-3">
        <strong>Cr. Account:</strong> {{ $rtaFine->cr_account }}
    </div>

    <div class="form-group col-md-3">
        <strong>Vehicle:</strong> {{ $rtaFine->vehicle }}
    </div>

    <div class="form-group col-md-3">
        <strong>Employee:</strong> {{ $rtaFine->employee }}
    </div>

    <div class="form-group col-md-3">
        <strong>Expense Account:</strong> {{ $rtaFine->expense_account }}
    </div>

    <div class="form-group col-md-3">
        <strong>Debit Account:</strong> {{ $rtaFine->debit_account }}
    </div>

    <div class="form-group col-md-3">
        <strong>Allowed Amount:</strong> {{ $rtaFine->allowed_amount }}
    </div>

    <div class="form-group col-md-3">
        <strong>Exp. Amount:</strong> {{ $rtaFine->exp_amount }}
    </div>

    <div class="form-group col-md-3">
        <strong>Surcharge Amount:</strong> {{ $rtaFine->surcharge_amount }}
    </div>

    <div class="form-group col-md-3">
        <strong>Total Chargeable Amount:</strong> {{ $rtaFine->total_chargeable }}
    </div>

    <div class="form-group col-md-6">
        <strong>Remarks:</strong> {{ $rtaFine->remarks }}
    </div>

    <div class="form-group col-md-6">
        <strong>Attachment:</strong><br>
        @if ($rtaFine->attachment)
            <a href="{{ asset('uploads/attachments/' . $rtaFine->attachment) }}" target="_blank">View File</a>
        @else
            No file uploaded
        @endif
    </div>
</div>
