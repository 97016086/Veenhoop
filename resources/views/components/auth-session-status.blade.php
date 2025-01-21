@props(['status'])

@if ($status)
	<div	{{ $attributes->merge(['class'	=>	'font-medium text-sm text-lime-500 dark:text-lime-400']) }}>
			{{ $status }}
	</div>
@endif