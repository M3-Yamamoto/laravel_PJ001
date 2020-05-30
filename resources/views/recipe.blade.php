@component('mail::message')
# Introduction

{{ $recipe->name }}
The Recipe has been stored!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
