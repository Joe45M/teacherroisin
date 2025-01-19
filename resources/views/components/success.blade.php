<div>
    @if(session()->has('saved'))

        <div id="success" class="bg-green-500 p-5 rounded-[12px] text-white mb-3">Saved!</div>

        <script>
            setTimeout(() => {
                document.querySelector('#success').style.display = 'none';
                console.log('hi')
            }, 2000)
        </script>

    @endif
</div>
