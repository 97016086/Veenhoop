<form	action="{{	route('grades')  }}"	method="POST">
	@csrf
	<input	type="number"	name="score"	min="1"	max="10"	required	>
	<button	type="submit">Opslaan</button>
</form>