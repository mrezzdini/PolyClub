@php 
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return view('/');
@endphp