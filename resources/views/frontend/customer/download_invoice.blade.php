
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice of {{ $order_id }}</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="3">
						<table>
							<tr>
								<td class="title">
									<img
										src="https://i.ibb.co/4NX0mq1/20230724-16391666666.png"
										style="width: 100%; max-width: 300px"
									/>
								</td>

								<td>
									Invoice #: {{ $order_id }}<br />
									Created: {{ $order->created_at->format('M d, Y') }}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="3">
						<table>
							<tr>
								<td>
									GreenyEcommerce, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, CA 12345
								</td>

								<td style="float: right">
									{{ $order->BillingAddress->f_name.' '. $order->BillingAddress->l_name }}<br />
									{{ $order->BillingAddress->email }}<br />
									{{ $order->BillingAddress->address }}
								</td>
							</tr>
						</table>
					</td>
				</tr>



				<tr class="heading">
					<td>Item</td>
					<td style="text-align: left">Price</td>
					<td>Total</td>
				</tr>
                @foreach ($order->Products as $product)
                    <tr class="item">
                        <td>{{ Str::limit($product->Product->product_name, 20) }}Q({{ $product->quantity }})</td>
                        <td style="text-align: left">TK {{ $product->price }}</td>
                        <td>TK {{ $product->price * $product->quantity }}</td>
                    </tr>
                @endforeach
                <tr class="hr-row">
                    <td colspan="3"><hr></td>
                </tr>
				<tr class="total">
					<td>--</td>
					<td>Subtotal: </td>
					<td>TK {{ $order->total }}</td>
				</tr>
				<tr class="total">
					<td>--</td>
					<td>Charge: </td>
					<td>TK {{ $order->charge }}</td>
				</tr>
				<tr class="total">
					<td>--</td>
					<td>Discount: </td>
					<td>TK {{ $order->discount }}</td>
				</tr>
				<tr class="total">
					<td>--</td>
					<td>Total: </td>
					<td>TK {{ ($order->total + $order->charge) - $order->discount }}</td>
				</tr>

                <tr class="hr-row">
                    <td colspan="3"><hr></td>
                </tr>

                <tr class="heading">
					<td colspan="2">Payment Method</td>

					<td>Due</td>
				</tr>

				<tr class="details">
					<td colspan="2">
                        @if ($order->payment_type == 1)
                        Cash On Delevery
                        @elseif ($order->payment_type == 2)
                        SSL Commerz
                        @elseif ($order->payment_type ==3)
                        Stripe
                        @endif
                    </td>

					<td>
                        @if ($order->payment_type == 1)
                        TK {{ ($order->total + $order->charge) - $order->discount }}
                        @else
                        TK 0.00
                        @endif
                    </td>
				</tr>
			</table>
		</div>
	</body>
</html>

