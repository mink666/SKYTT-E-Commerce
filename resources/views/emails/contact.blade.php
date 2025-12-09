@component('mail::message')
# Liên hệ mới từ khách hàng

**Họ và tên:** {{ $data['name'] }}
**Email:** {{ $data['email'] }}
**Số điện thoại:** {{ $data['phone'] }}

@endcomponent
