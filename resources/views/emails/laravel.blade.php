{{-- @dd($data) --}}
@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', [
    'url' => '{{ $data->url }}'
    ])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
