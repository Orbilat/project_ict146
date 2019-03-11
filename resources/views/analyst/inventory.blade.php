@extends('layouts.app')

@section('content')
<h3 class="hblue pull-left ">Inventory</h3>
<a class="btn btn-info btn-lg pull-right margintop" href="/analyst/inventory/history">View History</a>
<br>
<table id="sampledata" class="display sampledata" style="width:100%">
    <thead>
        <tr>
            <th>Item Id</th>
            <th>Item Type</th>
            <th>Container</th>
            <th>Quantity</th>
            <th>To use</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td><input name="itemid[]" value="{{ $item->itemId }}" hidden>{{ $item->itemId }}</td>
                <td>{{ $item->itemType }}</td>
                <td>{{ $item->containerType }}</td>
                <td class="qty">{{ $item->quantity }}</td>
                <td><input class="qtyinput" type="number" name="borrowqty[]" min="0" max="{{ $item->quantity }}" value="0"></td>
            </tr>
        @endforeach
    </tbody>
</table>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Transact</button>


<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            
          </div>
          <div class="modal-body">
            <h3>Proceed with the transaction?</h3>
            <form action="{{ route('inventoryupdate') }}" method="post" class="bookingInput">
                {{ csrf_field() }}
                <input id="ids" name="itemid" hidden>
                <input id="quantities" name="borrowqty" hidden>
                <input type="submit" class="accept" value="Proceed">
            </form>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#sampledata').DataTable();

        $("#myModal").on('show.bs.modal', function(e) {
            var quantity = $("input[name='borrowqty[]']").map(function(){return $(this).val();}).get();
            var ids = $("input[name='itemid[]']").map(function(){return $(this).val();}).get();
            $('#ids').val(ids);
            $('#quantities').val(quantity);
        });

        $(".qtyinput").change(function(){
            var siblingqty = $(this).closest("td").siblings(".qty").text(); //get the quantity of the row
            // alert(siblingqty);
            if(parseInt(siblingqty) < parseInt($(this).val())){
                alert("Input Value must be lower the current quantity");
                $(this).val(0);
            }
        });
    });
    /*$("#transact").click(function(){
        var quantity = $("input[name='borrowqty[]']").map(function(){return $(this).val();}).get();
        var ids = $("input[name='itemid[]']").map(function(){return $(this).val();}).get();
        alert(quantity);

        $.ajax({
            type: "POST",
            url: "/analyst/inventory/update",
            dataType:"json",
            data: { quantity : quantity, ids: ids },
            success: function(res){
                console.log(JSON.stringify(res));
            },
            error: function(res){
                console.log("error" + JSON.stringify(res));
            }
        });*/
        
        /*var form= $('<form action="/analyst/inventory/update" method="POST">' + 
            '<input type="hidden" name="itemids[]" value="' + ids + '">' +
            '<input type="hidden" name="qtys[]" value="' + quantity + '">' +
        '</form>').submit();
        $(document.body).append(form);

    })*/
</script>
@endsection
