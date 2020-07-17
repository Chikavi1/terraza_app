
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Pagar</div>

        <div class="card-body">
          <form action="{{ route('pay') }}" method="POST" id="paymentForm">
            @csrf
            <div class="row">
              <div class="col-auto">
                <label>Procesando tu pago</label>
                <input 
                type="number"
                min="5"
                step="0.01"
                class="form-control"
                name="value"
                value="{{ mt_rand(500,10000) / 100 }}"
                >
                <small class="form-text text-muted">
                  Use Values with up to two decimal positions,using dot "."
                </small>
              </div>
            </div>  
            <div class="row mt-3">
              <div class="col">
                <label>Select the desired payment platform:</label>
                <div class="form-group" id="toggler">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @foreach($paymentPlatforms as $paymentPlatform)
                      <label class="btn btn-outline-secondary rounded m-2 p-1"
                          data-target="#{{ $paymentPlatform }}Collapse" data-toggle="collapse">
                        <input type="radio" name="payment_platform" value="{{ $paymentPlatform }}" required>
                        <img class="img-thumbnail" src="{{ asset($paymentPlatform.'.jpg')}}" alt="">
                      </label>
                    @endforeach
                  </div>
                  @foreach($paymentPlatforms as $paymentPlatform)
                    <div id="{{ $paymentPlatform }}Collapse" class="collapse" data-parent="#toggler">
                    @includeIf('components.' . strtolower($paymentPlatform ). '-collapse')
                    </div>
                 @endforeach
              </div>
              </div>
            </div>

            <div class="text-center mt-3">
              <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pagar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');

    const elements = stripe.elements({
        locale:'es'
    });

    const cardElement = elements.create('card');

    cardElement.mount('#cardElement');
</script>

<script>

const form = document.getElementById('paymentForm');
const payButton = document.getElementById('payButton');

console.log(payButton);


payButton.addEventListener('click',async(e) => {


    


    if(form.elements.payment_platform.value === "stripe"){

    e.preventDefault();


    const { paymentMethod,error } = await stripe.createPaymentMethod(
        'card',cardElement,{
            billing_details: {
                "name": "{{ auth()->user()->name }}",
                "email": "{{ auth()->user()->email }}",
            }
        }
    )


if(error){
    const displayError = document.getElementById('cardErrors');
    displayError.textContent = error.message;
}else{
    const tokenInput = document.getElementById('paymentMethod');
    tokenInput.value = paymentMethod.id;
    form.submit();
}
}
});

</script>

