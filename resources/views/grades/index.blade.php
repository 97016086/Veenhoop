<x-app-layout>
<table>
	<thead>
		<th>Student</th>
		<th>Vak</th>
		<th>Cijfer</th>
		<th>Blok</th>
		<th>Ingevoerd door</th>
	</thead>
	<tbody>
			@foreach ($grades as	$grade )
				<tr>
					<td>{{ $grade->student->name }}</td>
					<td>{{ $grade->subject->name }}</td>
					<td>{{ $grade->score }}</td>
					<td>{{ $grade->block }}</td>
				</tr>
			@endforeach
	</tbody>
</table>
</x-app-layout>