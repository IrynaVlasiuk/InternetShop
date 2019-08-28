@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 hidden">
                <div>Values</div>
                <select name="modification-value" id="select-modification-value">
                    <option value="">Choose value</option>
                    @foreach($modifications as $modification)
                        @if($modification->pivot)
                        <option value="{{ $modification->pivot->value }}" name="value">{{ $modification->pivot->value }}</option>
                        @endif
                    @endforeach
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

        $('#select-category, #select-modification').on('change', function() {
            let category_id = $('#select-category').children("option:selected").val();
            let modification_id = $('#select-modification').children("option:selected").val();
            let data = { category_id: category_id, modification_id: modification_id };
             ajaxHandler('GET', '/products', data,  renderElements);
        });

        function renderElements(data) {
            let result = $('<div/>').append(data).find('.container').html();
            $('.container').html(result);
            $('.hidden').show();
        }

        $('.container').delegate('#select-modification-value','change', function () {
            let category_id = $('#select-category').children("option:selected").val();
            let modification_id = $('#select-modification').children("option:selected").val();
            let value = $(this).children("option:selected").val();
            let data = { category_id: category_id, modification_id: modification_id, value: value };
            $("#select-modification-value").val(value);
            ajaxHandler('GET', '/products', data, renderElements);
        })

        $('.container').delegate('a[id="show-more"]', 'click', function () {
            let product_id = $(this).parent().siblings('.id').text();
            let data = {};
            let context  = $(this);
            $(this).parent().parent().parent().children('td.modifications').remove();
            ajaxHandler('GET', '/show/'+product_id, data, function(params) {
                let modifications = params.data;
                $('<tr></tr>').insertAfter(context.closest('tr'));
                for(let i in modifications)
                    $('<td class="modifications">'+ modifications[i].name + ':' + modifications[i].pivot.value+'</td></tr>').insertAfter(context.closest('tr'));
            });
        });

     })
    </script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .data, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .row{
            margin-bottom: 40px;
        }

        .hidden{
            display: none;
        }

        .modifications {
            //background-color: #9ba2ab;
        }
    </style>
@endsection