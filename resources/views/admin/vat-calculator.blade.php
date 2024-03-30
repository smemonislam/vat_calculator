@extends('admin.layouts.app')

@section('admin_content')
    <form class="g-3 mt-5">      
        <div class="mb-3 row">
            <label for="vatRate" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-5">                
                <input class="form-control" type="number" value="" id="sum" step="0.01" min="0" required>                
            </div>
        </div>

        <div class="mb-3 row">
            <label for="vatRate" class="col-sm-2 col-form-label">Base Value</label>
            <div class="col-sm-6">  
                <div class="row align-items-center">
                    <div class="col-auto">
                        <input class="form-check-input" name="vat" type="radio" value="including" id="formactv"  checked>
                        <label class="form-check-label" for="invalidCheck">VAT Inclusive</label>
                    </div>              
                    <div class="col-auto">
                        <input class="form-check-input" name="vat" type="radio" value="excluding" id="formactn">
                        <label class="form-check-label" for="invalidCheck">VAT Exclusive</label>  
                    </div>
            
                    <div class="col-auto">
                        <div class="input-group">                    
                            <input class="form-control" type="number" value="15" id="percentage" step="0.01" min="0" required>
                            <span class="input-group-text" id="basic-addon1">%</span>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
        
        <div class="col-12">
            <button class="btn btn-primary" type="button" onclick="vatCalculate()">Calculate</button>
        </div>
    </form>
    
    <div class="card mt-5 d-none" id="dBlock">  
        <div class="card-body">
            <button type="button" class="btn btn-success w-100 mb-3">Result</button>
            <div class="mb-3 row">
                <label for="vatAmount" class="col-sm-2 col-form-label" id="vatText"></label>
                <div class="col-sm-6">                
                    <input class="form-control" type="text" value="" id="vatAmount">                
                </div>
            </div>
            <div class="mb-3 row">
                <label for="vatValue" class="col-sm-2 col-form-label">Vat Amount</label>
                <div class="col-sm-6">                
                    <input class="form-control" type="text" value="" id="vatValue">                
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>        
         function vatCalculate() {
            const vatOption = document.querySelector('input[name="vat"]:checked').value;
            const price = parseFloat(document.querySelector('#sum').value);
            const percentage = parseFloat(document.querySelector('#percentage').value);

            const vatAmount = document.querySelector('#vatAmount');
            const vatValue = document.querySelector('#vatValue');
            const dBlock = document.querySelector('#dBlock');
            const vatText = document.querySelector('#vatText');

            // Prepare the data
            const data = {
                operation: vatOption,
                gross_sum: price,
                tax_percentage: percentage,
            };

            // Send data using Axios
            axios.post("{{ route('vat.calculator.store') }}", data)
                .then(function (response) {
                    if(response.data.status == 'success'){
                        dBlock.classList.remove('d-none');
                        dBlock.classList.add('d-block');
                        vatAmount.value = response.data.net_amount;
                        vatValue.value = response.data.vat_amount;
                        vatText.innerHTML = "Price " + "( " + response.data.operation + " )"

                        iziToast.success({
                            message: "VAT calculation completed successfully.",
                            position: 'topRight'
                        });
                    }
                   
                })
                .catch(function (error) {
                    if (error.response && error.response.data.errors) {
                        Object.entries(error.response.data.errors).forEach(([key, value]) => {
                            iziToast.error({
                                title: 'Error',
                                message: value,
                                position: 'topRight'
                            });
                        });
                    }
                });
        }
    </script>
@endpush