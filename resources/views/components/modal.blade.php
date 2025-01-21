@props([
	'name',
	'show'	=>	false,
	'maxWidth'	=>	'2xl'

])

@php
$maxWidth	=	[
	'sm'	=> 'sm:max-w-sm',
	'md'	=>	'sm:max-w-md',
	'lg'	=>	'sm:max-w-lg',
	'xl'	=>	'sm:max-w-xl',
	'2xl'	=>	'sm:max-w-2xl',
][$maxWidth];
@endphp

<div
		x-data="{
		show:	@js($show),
		focusables()	{
				//	All focusable element types...
				let	selector	=	'a,	button,	input:not([type=\'hidden\']),	textarea,	select,	details,	[tabindex]:not([tabindex=\'-1\'])'
				return	[...$el.querySelectorAll(selector)]
						//All non-disabled	elements...
						.filter(el	=>	!	el.hasAttribute('disabled'))
						},
						firstFocusable()	{	return	this.focusables()[0]},
						lastFocusable()	{	return	this.focusables().slice(-1)[0]	},
						nextFocusable()	{	return	this.focusables()[this.nextFocusableIndex()]	||	this.firstFocusable()	},
						prevFocusable()	{	return	this.focusables()[this.prevFocusableIndex()]	||	thislastFocusable()	},
						nextFocusableIndex()	{	return	(this.focusables().indexOf(document.activeElement)	+1)	%	(this.focusables().length	+1)	},
						prevFocusableIndex()	{	return	Math.max(0, this.focusables().indexOf(document.activeElement))	-1	},
		}"
		x-init="$watch('show', value	=>
		
		)">

</div>