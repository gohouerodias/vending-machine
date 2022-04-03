@extends('app')
@section('title', 'historique')

@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Historique de vente</h3>
        <div class="card shadow">
            <div class="card-body">

                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table dataTable my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>Quantity sold</th>
                                <th>Sold at&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($historique) > 0)
                                @foreach ($historique as $sellevent)
                                    <tr>
                                        <td>
                                            <!--<img class="rounded-circle mr-2" width="30" height="30"
                                                                                                                        src="assets/img/avatars/avatar1.jpeg">-->
                                            {{ $sellevent->product->name }}
                                        </td>
                                        <td>{{ $sellevent->quantity }}</td>
                                        <td>{{ $sellevent->sold_at }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <p>page not found</p>
                            @endif


                        </tbody>

                        <tfoot>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td><strong>Quantity sold</strong></td>
                                <td><strong>Sold date</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    {{ $historique->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
