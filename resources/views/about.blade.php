@extends('layouts.app')
@section('title',config('constant.company_name').' About Us')
@section('main')
	<main class="main-content">
		<div class="breadcrumb-wrapper">
			<nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
				<a href="{{ route('front.index') }}" title="Back to the frontpage">Home</a>
				<span aria-hidden="true">&rsaquo;</span>
				<span>About us Page</span>
			</nav>
			<h1 class="section-header__title">About us</h1>
		</div>
		<div class="wrapper">
			<div class="grid">
				<div class="grid__item">
					<h1 class="title-heading">About Us</h1>
					<div class="rte">
						<p>
							A great About Us page helps builds trust between you and your customers. The more content you provide about you and your business, the more confident people will be when purchasing from your store.
						</p>
						<p>
							Your About Us page might include:
						</p>
						<ul>
							<li>Who you are</li>
							<li>Why you sell the items you sell</li>
							<li>Where you are located</li>
							<li>How long you have been in business</li>
							<li>How long you have been running your online shop</li>
							<li>Who are the people on your team</li>
							<li>Contact information</li>
							<li>Social links (Twitter, Facebook)</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

