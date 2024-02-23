<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Deco Dar Ziadia - Shooping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background: #eee;
        }

        .ui-w-40 {
            width: 40px !important;
            height: auto;
        }

        .card {
            box-shadow: 0 1px 15px 1px rgba(52, 40, 104, .08);
        }

        .ui-product-color {
            display: inline-block;
            overflow: hidden;
            margin: .144em;
            width: .875rem;
            height: .875rem;
            border-radius: 10rem;
            -webkit-box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.15) inset;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    @include('template.header')

    <div class="container px-3 my-5 clearfix">

        <div class="card">
            <div class="card-header">
                <h2>Shopping Cart</h2>
            </div>
            @if ($commande && $commande->etat === 'valider')
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                    <div class="mt-4">
                        <label class="text-muted font-weight-normal">Your validation email has been sent</label>
                        <label class="text-muted font-weight-normal">Order n° {{ $commande->id }}</label>
                        <label class="text-muted font-weight-normal">Thank you for your trust,
                            {{ Auth()->user()->name }}</label>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered m-0">
                        <thead>
                            <tr>
                                <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details
                                </th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                                <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                                <th class="text-right py-3 px-4" style="width: 100px;">Total</th>
                                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#"
                                        class="shop-tooltip float-none text-light" title
                                        data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($commande->ligne_commandes as $lc)
                                <tr>
                                    <td class="p-4">
                                        <div class="media align-items-center">

                                            <img src="{{ asset('uploads') }}/{{ $lc->product->photo }}"
                                                class="d-block ui-w-40 ui-bordered mr-4" alt name="photo">

                                            <div class="media-body">
                                                <a href="#" class="d-block text-dark">{{ $lc->product->name }}</a>
                                                <small>
                                                    <span class="text-muted">{{ $lc->product->description }}</span>

                                                </small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-right font-weight-semibold align-middle p-4">
                                        {{ $lc->product->price }}</td>
                                    <td class="align-middle p-4"><input type="text" class="form-control text-center"
                                            value="{{ $lc->qte }}"></td>
                                    <td class="text-right font-weight-semibold align-middle p-4">
                                        {{ $lc->product->price * $lc->qte }}</td>
                                    <td class="text-center align-middle px-0">
                                        <a href="/ligneCommande/delete/{{ $lc->id }}"
                                            class="shop-tooltip close float-none text-danger" title
                                            data-original-title="Remove" title="Remove">×</a>
                                        {{--  <a href="/delete/{{ $lc->id }}" class="shop-tooltip close float-none text-danger" title
                                                data-original-title="Remove">×</a> --}}
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>



                @php
                    $totalPrice = 0;
                @endphp

                @foreach ($commande->ligne_commandes as $lc)
                    @php
                        $lineTotal = $lc->product->price * $lc->qte;
                        $totalPrice += $lineTotal;
                    @endphp
                @endforeach



                <div class="float-right">
                    <label class="text-muted font-weight-normal m-0">Total price</label>
                    <div class="text-large"><strong>{{ $totalPrice }}</strong></div>
                </div><br><br>



                @if ($commande->etat === 'valider')
                    <div class="float-right">
                        <a href="{{ route('shop') }}">
                            <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to
                                shopping</button>
                        </a>
                        <a href="{{ route('supprimer', ['id' => $commande->id]) }}"><button type="button"
                                class="btn btn-lg btn-primary mt-2"
                                title="cancellation causes sumprimation">Cancel</button></a>
                    </div>
                @else
                    <div class="float-right">
                        <a href="{{ route('shop') }}">
                            <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to
                                shopping</button>
                        </a>
                        <a href="{{ route('Commande') }}"><button type="button" class="btn btn-lg btn-primary mt-2"
                                title="order">order</button></a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

    @include('template.footer')
</body>

</html>
