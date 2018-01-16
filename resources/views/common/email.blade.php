<!-- メールのHTML -->
<div class="mailform">
	<p>
		名前 : {{ $order->name }}
	</p>
	
	<p>
		メールアドレス : {{ $order->address }}
	</p>
	
	<p>
		件名 : {{ $order->subject }}
	</p>

	<p>
		本文 : <br>
		{{ $order->body }}
	</p>
</div>