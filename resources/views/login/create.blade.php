<h1	class="my-16 text-center text-2xl font-medium	text-slate-600">
	Meld je aan
</h1>

	<form	action="{{route('login')}}"	method="POST">
		@csrf
		<div	class="mb-8">
			<label	for="name"	class="mb-2	block	text-sm	font-medium	text-slate-900">Naam</label>
			<input	type="text">
		</div>

	<div	class="mb-8">
		<label	for="password"	class="mb-2	block	text-sm	font-medium	text-slate-900">Wachtwoord</label>
		<input	type="password">
	</div>

<button	type="submit">verzenden</button>
<div	class="mb-8	text-sm	font-medium">
	<a	href="#"		class="text-slate-900 hover:underline">Wachtwoord vergeten</a>	
	{{ auth()->user()->name ??	'Guest'	}}
</div>
	</form>
