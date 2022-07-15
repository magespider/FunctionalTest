@props(['datetime'])
<span
    x-data="{
        datetime: '{{ $datetime->format('c') }}',
        language: document.querySelector('html').getAttribute('lang'),
    }"
    x-text="(new Date(datetime)).toLocaleString(language, { year:'numeric', month:'short', day:'numeric', hour:'numeric', minute:'numeric' })"
></span>