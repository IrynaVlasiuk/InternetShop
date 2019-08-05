@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div>Categories</div>
                <select name="category" id="select-category">
                    <option value="all">Choose category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <div>Modifications</div>
                <select name="modification" id="select-modification">
                    <option value="all">Choose modification</option>
                    @foreach($modifications as $modification)
                        <option value="{{$modification->id}}">{{$modification->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 values">
                <div class="title-values">Values</div>
                <select name="modification-value" id="select-modification-value">
                </select>
            </div>
        </div>
        <div class="row product-list">
                <table>
                    <tr>
                        <th>Article</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                    @foreach($products as $product)
                    <tr class="data">
                        <td class="id">{{$product->article}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td><a id="show-more" href="#">Show more</a></td>
                    </tr>
                    @endforeach
                </table>

        </div>
    </div>
    <script>
    $(document).ready(function(){
        function ajaxHandler(type, url, data, success, error) {
            $.ajax({
                type: type,
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: success,
                error: error
            })
        }

        $('#select-category').on('change', function() {
           let category_id = $(this).children("option:selected").val();
           let data = {category_id: category_id};
           ajaxHandler('GET', '/category', data, renderElements);
        });

        $('#select-modification').on('change', function() {
            let id = $(this).children("option:selected").val();
            let data = { id: id };
             ajaxHandler('GET', '/modification'+id, data, showModificationsValue);
        });

        function showModificationsValue(data) {
            let modifications = data.modifications;
            $('.title-values').show();
            $('#select-modification-value').empty();
            if(modifications) {
                $('#select-modification-value').show();
                for(let i in modifications){
                    $('#select-modification-value').append('<option value="'+ modifications[i].pivot.value +'">'+ modifications[i].pivot.value+'</option>');
                }
            } else {
                $('#select-modification-value').hide();
            }
        }

        $('#select-modification-value').on('change', function () {
            let modification_id = $('#select-modification').children("option:selected").val();
            let value = $(this).children("option:selected").val();
            let data = {};
            ajaxHandler('GET', '/modification/'+modification_id+'/value/'+value, data, renderElements);
        })

        $('.product-list').delegate('a[id="show-more"]', 'click', function () {
            let product_id = $(this).parent().siblings('.id').text();
            let data = {product_id: product_id};
            let context  = $(this);
            $(this).parent().parent().parent().children('td.modifications').remove();
            ajaxHandler('GET', '/show-more'+product_id, data, function(params) {
                let modifications = params.data;
                $('<tr></tr>').insertAfter(context.closest('tr'));
                for(let i in modifications)
                    $('<td class="modifications">'+ modifications[i].name + ':' + modifications[i].pivot.value+'</td></tr>').insertAfter(context.closest('tr'));
            });
        });

        function renderElements(data) {
            $('.product-list .data').empty();
            $('.product-list .modifications').remove();
            let products = data.products;
            for(let i in products) {
                $('.product-list table').append('<tr class="data">' +
                    '<td class="id">'+products[i].article +'</td>' +
                    '<td>'+products[i].name +'</td>' +
                    '<td>'+products[i].price +'</td>' +
                    '<td><a id="show-more" href="#">Show more</a></td>' +
                    '</tr>');
            }
        }

     })
    </script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .row{
            margin-bottom: 40px;
        }

        .title-values, #select-modification-value{
            display: none;
        }
    </style>
@endsection