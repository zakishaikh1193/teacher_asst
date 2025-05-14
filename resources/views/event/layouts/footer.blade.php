<!-- Footer -->
{{-- <footer class="site-footer text-center p-3">
    <div class="container" style="color: white">
        <p class="mb-2 fw-bold">Curious to learn more? </p>
        <p class="fw-light">
            We’re here for any questions or details before you decide.<br>
            Reach us at: <a href="mailto:info@legato-design.com" class="fw-bold">info@legato-design.com</a></p>
        <p class="fw-light">
            Let’s Empower Educators to Lead Change!
            <br>This is more than a session; it’s a meaningful step toward better assessment and lasting growth.
        </p>
    </div>
</footer> --}}

@php
    $isRTL = app()->getLocale() === 'ar';
@endphp

<footer class="site-footer text-center p-3" dir="{{ $isRTL ? 'rtl' : 'ltr' }}">
    <div class="container" style="color: white; text-align: {{ $isRTL ? 'right' : 'center' }};">
        <p class="mb-2 fw-bold">
            {{ $isRTL ? 'هل ترغب في معرفة المزيد؟' : 'Curious to learn more?' }}
        </p>
        <p class="fw-light">
            {{ $isRTL ? 'نحن هنا لأي استفسارات أو تفاصيل قبل اتخاذ قرارك.' : 'We’re here for any questions or details before you decide.' }}<br>
            {{ $isRTL ? 'راسلنا على: ' : 'Reach us at: ' }}
            <a href="mailto:contact@legato-design.com" class="fw-bold">contact@legato-design.com</a>
        </p>
        <p class="fw-light">
            {{ $isRTL ? 'دعونا نمكن المعلمين من قيادة التغيير!' : 'Let’s Empower Educators to Lead Change!' }}
            <br>
            {{ $isRTL ? 'هذه أكثر من مجرد جلسة؛ إنها خطوة هادفة نحو تقييم أفضل ونمو مستدام.' : 'This is more than a session; it’s a meaningful step toward better assessment and lasting growth.' }}
        </p>
    </div>
</footer>
