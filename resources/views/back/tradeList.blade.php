@extends('layoutBack')

@section('content')
    <h1>Transacciones</h1>

    <input class="Tab" id="tab1" type="radio" name="tabs" checked>
    <label class="Tab col-6 Button row center middle" for="tab1">Mis Compras</label>

    <input class="Tab" id="tab2" type="radio" name="tabs">
    <label class="Tab col-6 Button row center middle" for="tab2">Mis Ventas</label>

    <article class="TabContainer" id="EditProduct">
        <table class="rwd-table" style="text-align: center; margin-top:10px">
            <tr class="header-table">
                <th>ID compra</th>
                <th>Fecha</th>
                <th>Servicio</th>
                <th>Valor</th>
                <th>Proveedor</th>
            </tr>
            @foreach($buys as $buy)
                <tr>
                    <td>{{$buy->zp_ticket_id}}</td>
                    <td>{{$buy->created_at->diffForHumans()}}</td>
                    <td>{{$buy->service->serviceType->name}}</td>
                    <td>${{$buy->value}}</td>
                    <td>{{$buy->service->provider->user->name}}</td>
                </tr>
            @endforeach
        </table>
    </article>

    <article class="TabContainer col-12" id="NewProduct">
        <table class="rwd-table" style="text-align: center; margin-top:10px">
            <tr class="header-table">
                <th>ID compra</th>
                <th>Fecha</th>
                <th>Servicio</th>
                <th>Estado</th>
                <th>Valor</th>
                <th>Cliente</th>
            </tr>


            @foreach($sales as $sale)
                <tr>
                    <td>{{$sale->zp_ticket_id}}</td>
                    <td>{{$sale->created_at->diffForHumans()}}</td>
                    <td>{{$sale->service->serviceType->name}}</td>
                    <td>{{$sale->state_id}}</td>
                    <td>${{$sale->value}}</td>
                    <td>{{$sale->user->name}}</td>
                </tr>
            @endforeach

        </table>
    </article>

    <div class="preload hidden" id="loader-wrapper">
        <div id="loader"></div>
    </div>
@endsection

@section('styles')
    <style>
        .TabContainer {
            width: 100%;
            display: none;
        }

        .Tab {
            cursor: pointer;
            display: inline-flex;
        }

        [for^="tab"],
        [for="categoryTab"],
        [for="productTab"],
        [for="offerTab"] {
            color: white;
            opacity: .8
        }

        #tab1:checked ~ [for="tab1"],
        #tab2:checked ~ [for="tab2"],
        #categoryTab:checked ~ [for="categoryTab"],
        #productTab:checked ~ [for="productTab"],
        #offerTab:checked ~ [for="offerTab"] {
            opacity: 1
        }

        #tab1:checked ~ #EditProduct,
        #tab2:checked ~ #NewProduct,
        #categoryTab:checked ~ #EditCategoryProduct,
        #productTab:checked ~ #EditDetailProduct,
        #offerTab:checked ~ #EditOfferProduct {
            display: block;
        }

        input.Tab {
            display: none
        }

        label.Tab {
            text-align: center;
        }
    </style>
@endsection