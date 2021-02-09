@extends('layouts.template')
@section('title', 'Dashboard')
@section('content')
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##0.00\"\"",
		indexLabel: "{label} {y}",
		dataPoints: [
            @foreach($totalExpense as $expenses)
			{y:"{{$expenses->Total}}" , label:"{{$expenses->expense_category_name}}" },
			@endforeach
		]
	}]
});
chart.render();

}
</script>

      <div class="container-fluid">
        <h1 class="mt-4">My Expenses</h1>
        <table class="table">
            <tr>
                <th>Expense Categories</th>
                <th>Total</th>
            </tr>
            <tbody>
            @foreach($totalExpense as $expenses)
            <tr>
                    <td>{{$expenses->expense_category_name}}</td>
                    <td>{{$expenses->Total}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
      </div>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
