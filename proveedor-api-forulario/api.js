const OPTIONS = {
    method: 'GET',
    params: {ip: '185.65.135.230'},
    headers: {
      'X-RapidAPI-Key': 'b286bb583bmshbec4edad31c7c49p1715f3jsn7f38fd79dc3c',
      'X-RapidAPI-Host': 'ip-reputation-geoip-and-detect-vpn.p.rapidapi.com'
    }
  }

const fetchIpInfo = ip => {
    return fetch('https://ip-reputation-geoip-and-detect-vpn.p.rapidapi.com/${ip}', OPTIONS)

        .then(res => res.json())
        .catch(err => console.error(err))
}

const $form = document.querySelector('#form')
const $input = document.querySelector('#input')
const $submit = document.querySelector('#submit')
const $results = document.querySelector('#results')

$form.addEventListener('submit', async (event) => {
    event.preventDefault()
    const { value } = $input
    if (!value) return

    const ipInfo = await fetchIpInfo(value)

    if (ipInfo) {
        $results.innerHTML = JSON.stringify(ipInfo, null, 2)
    }

    $submit.removeAttribute('disable')
    $submit.removeAttribute('aria-busy')



})