@extends('layouts.app')
@section('title',config('constant.company_name').' View Cart')
@section('main')
			
<main class="main-content">
	<div class="breadcrumb-wrapper">
		<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
			<a href="index.html" title="Back to the frontpage">Home</a>
			<span aria-hidden="true">&rsaquo;</span>
			<span>Shopping Cart Page</span>
		</nav>
		<h1 class="section-header__title">Shopping Cart</h1>
	</div>
	<div class="wrapper">
		<form action="https://demo.tadathemes.com/cart" method="post" novalidate="" class="cart table-wrap">
			<table class="cart-table full table--responsive">
				<thead class="cart__row cart__header-labels">
					<tr>
						<th class="text-center">
							Product
						</th>
						<th class="text-center">
							Price
						</th>
						<th class="text-center">
							Quantity
						</th>
						<th class="text-center">
							Total
						</th>
					</tr>
				</thead>
				<tbody>
					<tr class="cart__row table__section">
						<td class="product-name" data-label="Product">
							<div class="img_item">
								<a href="product.html" class="cart__image">
								<img src="assets/images/demo1_cart1.jpg" alt="Raesent Scelerisque Dan - S / Red">
								</a>
							</div>
							<p class="product-title">
								<a href="product.html">
								Raesent Scelerisque Dan </a>
							</p>
							<div class="variant">
								<small>S / Red</small>
							</div>
							<a href="#" class="cart__remove">
							<small>Remove</small>
							</a>
						</td>
						<td data-label="Price">
							<span class="h3">
							<span class="money" data-currency-usd="$34.00">$34.00</span>
							</span>
						</td>
						<td data-label="Quantity">
							<div class="js-qty">
								<button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="0">
								<span class="icon icon-minus" aria-hidden="true"></span>
								<span class="fallback-text">−</span>
								</button>
								<input type="text" class="js-qty__num" value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_8772444163">
								<button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="11">
								<span class="icon icon-plus" aria-hidden="true"></span>
								<span class="fallback-text">+</span>
								</button>
							</div>
						</td>
						<td data-label="Total" class="text-center">
							<span class="h3">
							<span class="money" data-currency-usd="$34.00">$34.00</span>
							</span>
						</td>
					</tr>
					<tr class="cart__row table__section">
						<td class="product-name" data-label="Product">
							<div class="img_item">
								<a href="product.html" class="cart__image">
								<img src="assets/images/demo1_cart2.jpg" alt="Etiam dan lorem quis - Medium / Pink">
								</a>
							</div>
							<p class="product-title">
								<a href="product.html">
								Etiam dan lorem quis </a>
							</p>
							<div class="variant">
								<small>Medium / Pink</small>
							</div>
							<a href="#" class="cart__remove">
							<small>Remove</small>
							</a>
						</td>
						<td data-label="Price">
							<span class="h3">
							<span class="money" data-currency-usd="$100.00">$100.00</span>
							</span>
						</td>
						<td data-label="Quantity">
							<div class="js-qty">
								<button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="0">
								<span class="icon icon-minus" aria-hidden="true"></span>
								<span class="fallback-text">−</span>
								</button>
								<input type="text" class="js-qty__num" value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_10722484483">
								<button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="11">
								<span class="icon icon-plus" aria-hidden="true"></span>
								<span class="fallback-text">+</span>
								</button>
							</div>
						</td>
						<td data-label="Total" class="text-center">
							<span class="h3">
							<span class="money" data-currency-usd="$100.00">$100.00</span>
							</span>
						</td>
					</tr>
					<tr class="cart__row table__section">
						<td class="product-name" data-label="Product">
							<div class="img_item">
								<a href="product.html" class="cart__image">
								<img src="assets/images/demo1_cart3.jpg" alt="Corporis suscipit laboriosam - XS / Black">
								</a>
							</div>
							<p class="product-title">
								<a href="product.html">
								Corporis suscipit laboriosam </a>
							</p>
							<div class="variant">
								<small>XS / Black</small>
							</div>
							<a href="#" class="cart__remove">
							<small>Remove</small>
							</a>
						</td>
						<td data-label="Price">
							<span class="h3">
							<span class="money" data-currency-usd="$89.00">$89.00</span>
							</span>
						</td>
						<td data-label="Quantity">
							<div class="js-qty">
								<button type="button" class="js-qty__adjust js-qty__adjust--minus icon-fallback-text" data-id="" data-qty="0">
								<span class="icon icon-minus" aria-hidden="true"></span>
								<span class="fallback-text">−</span>
								</button>
								<input type="text" class="js-qty__num" value="1" min="1" data-id="" aria-label="quantity" pattern="[0-9]*" name="updates[]" id="updates_8772462979">
								<button type="button" class="js-qty__adjust js-qty__adjust--plus icon-fallback-text" data-id="" data-qty="11">
								<span class="icon icon-plus" aria-hidden="true"></span>
								<span class="fallback-text">+</span>
								</button>
							</div>
						</td>
						<td data-label="Total" class="text-center">
							<span class="h3">
							<span class="money" data-currency-usd="$89.00">$89.00</span>
							</span>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="grid cart__row">
				<div class="grid__item two-thirds small--one-whole">
					<label for="CartSpecialInstructions">Special instructions for seller</label>
					<textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea>
				</div>
				<div class="grid__item text-right one-third small--one-whole">
					<p>
						<span class="cart__subtotal-title">Subtotal</span>
						<span class="h3 cart__subtotal"><span class="money" data-currency-usd="$223.00">$223.00</span></span>
					</p>
					<p>
						<em>Shipping &amp; taxes calculated at checkout</em>
					</p>
					<input type="submit" name="update" class="btn btn2 update-cart" value="Update Cart">
					<input type="submit" name="checkout" class="btn" value="Check Out">
				</div>
			</div>
		</form>
		<div id="shipping-calculator">
			<h3>Get shipping estimates</h3>
			<div class="shipping-selector">
				<p class="field">
					<label for="address_country">Country</label>
					<select id="address_country" name="address[country]" data-default="United States">
						<option value="United States" data-provinces="[[]]">United States</option>
						<option value="Zimbabwe" data-provinces="[]">Zimbabwe</option>
					</select>
				</p>
				<p class="field" id="address_province_container">
					<label for="address_province" id="address_province_label">State</label>
					<select id="address_province" name="address[province]" data-default="">
						<option value="Alabama">Alabama</option>
						<option value="Alaska">Alaska</option>
						
					</select>
				</p>
				<p class="field">
					<label for="address_zip">Zip/Postal Code</label>
					<input type="text" id="address_zip" name="address[zip]">
				</p>
				<p class="field">
					<input type="button" class="get-rates btn button" value="Calculate shipping">
				</p>
			</div>
			<div id="wrapper-response" style="display: block;">
				<p id="shipping-rates-feedback" class="success">
					 There is one shipping rate available for 99501, Alaska, United States.
				</p>
				<ul id="shipping-rates">
					<li>International Shipping at <span class="money" data-currency-usd="$20.00 USD" data-currency="USD">$20.00 USD</span></li>
				</ul>
			</div>
		</div>
	</div>
</main>
@endsection