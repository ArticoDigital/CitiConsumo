<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citiconsumo</title>
    <link rel="stylesheet" href="{{asset('css/front/style.css')}}">
    @yield('styles')
</head>
<body class="{{Request::route()->getName()}}">
<div id="preloader">
    <figure class="image">


        <svg width="285px" height="331px" viewBox="0 0 285 331" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <!-- Generator: Sketch 3.8.3 (29802) - http://www.bohemiancoding.com/sketch -->
            <desc>Created with Sketch.</desc>
            <defs></defs>
            <g id="logo-city-consumo-curvas" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <path d="M101.0205,83.9371 C96.6635,87.4351 90.3245,86.7501 86.8375,82.3551 C83.3555,77.9681 84.0905,71.5881 88.4695,68.1151 C92.8515,64.6381 99.2235,65.3801 102.7065,69.7691 C106.1905,74.1601 105.4025,80.4601 101.0205,83.9371 M103.2975,41.7571 L100.8675,54.2611 C100.8675,54.2611 73.4715,47.5271 69.1515,75.5971 L56.6665,73.0561 C56.6665,73.0561 58.5195,30.9651 103.2975,41.7571 M211.3955,29.5461 C178.4755,11.2301 141.3715,7.4471 107.5095,16.0841 L105.2905,27.9221 C105.2905,27.9221 90.3745,24.2361 75.0295,28.7711 C67.5785,32.7961 60.4645,37.5091 53.7845,42.8711 C48.7885,49.1951 44.9025,57.8511 43.1125,69.6631 L30.1675,67.0351 C25.9995,72.4811 22.1705,78.2921 18.7415,84.4681 C-19.3225,152.8881 5.2455,239.0671 73.6055,277.2441 C112.8165,298.9041 157.9095,300.1251 196.4645,284.3111 L236.8195,330.3991 C236.8195,330.3991 228.2185,300.3691 219.5085,272.4021 C238.2985,260.1981 254.6205,243.3201 266.4065,222.1331 C304.4425,154.0111 279.9235,67.5601 211.3955,29.5461" id="Fill-1" fill="#004F8F"></path>
                <path d="M10.4517,63.0308 L21.8827,65.7368 L34.7357,68.7788 C36.9017,57.0318 41.0637,48.5038 46.2607,42.3438 C53.1087,37.1988 60.3697,32.7148 67.9467,28.9308 C83.4297,24.8918 98.2187,29.0538 98.2187,29.0538 L100.8167,17.2948 L103.6047,4.6658 C16.6467,-19.2992 10.4517,63.0308 10.4517,63.0308" id="signal-1"></path>
                <path d="M92.9541,55.2379 L95.7841,42.8179 C51.3731,30.5949 48.1721,72.6059 48.1721,72.6059 L60.5701,75.5449 C65.7881,47.6289 92.9541,55.2379 92.9541,55.2379" id="signal-2"></path>
                <path d="M80.1182,68.6871 C75.6302,72.0171 74.6922,78.3711 78.0302,82.8691 C81.3752,87.3711 87.6882,88.2601 92.1552,84.9041 C96.6442,81.5681 97.6352,75.2971 94.2932,70.7961 C90.9542,66.2961 84.6092,65.3531 80.1182,68.6871" id="signal-3"></path>
                <path d="M227.5791,228.044 C225.8321,230.854 223.3451,233.981 220.1191,237.423 C216.8911,240.866 213.8271,243.432 210.9281,245.119 L220.8281,231.766 L227.5791,228.044 L227.5791,228.044 Z M212.0711,234.908 L201.2391,249.248 C200.6161,249.902 199.9971,250.311 199.3781,250.47 C198.7581,250.626 198.0981,250.756 197.4001,250.854 C197.1181,250.893 196.6931,250.914 196.1271,250.923 C195.5571,250.929 195.1331,250.955 194.8541,250.994 L205.8661,236.415 C206.4861,235.759 207.1171,235.419 207.7571,235.403 C208.3951,235.385 209.0621,235.328 209.7641,235.231 L212.0711,234.908 L212.0711,234.908 Z M199.5741,237.292 L188.0781,253.006 L182.8341,253.736 L194.3291,238.023 L199.5741,237.292 L199.5741,237.292 Z M184.1991,93.178 L185.4571,93.002 C185.8771,92.943 186.4341,92.866 187.1361,92.769 C187.8341,92.671 188.3021,92.962 188.5401,93.641 L176.4741,109.862 L171.8941,109.219 L184.1991,93.178 L184.1991,93.178 Z M186.3251,240.421 C186.2031,240.578 186.0681,240.885 185.9171,241.333 C185.7661,241.781 185.6371,242.154 185.5391,242.455 L177.9561,252.492 C177.5961,252.971 176.9721,253.625 176.0931,254.462 C175.2101,255.297 174.6991,255.727 174.5611,255.745 C174.2981,255.923 173.9611,256.042 173.5411,256.101 L171.8631,256.334 C171.7221,256.354 171.2981,256.376 170.5901,256.405 C169.8791,256.431 169.3861,256.467 169.1071,256.505 L181.0801,241.151 L186.3251,240.421 L186.3251,240.421 Z M175.3361,92.487 C175.7561,92.429 176.3121,92.351 177.0141,92.253 C177.7121,92.156 178.1811,92.448 178.4191,93.127 L166.8651,108.422 L161.4111,109.182 L174.1071,92.872 L174.7361,92.784 C174.8741,92.766 174.9741,92.719 175.0361,92.635 C175.0951,92.558 175.1951,92.507 175.3361,92.487 L175.3361,92.487 L175.3361,92.487 Z M175.4521,240.652 L163.0241,257.353 L157.5711,258.112 L169.7881,241.441 L175.4521,240.652 L175.4521,240.652 Z M166.0431,94.851 C165.9221,95.012 165.7871,95.315 165.6361,95.764 C165.4841,96.212 165.3561,96.587 165.2581,96.885 C165.0151,97.206 164.5351,97.841 163.8131,98.797 C163.0911,99.753 162.3431,100.785 161.5711,101.889 C160.7971,102.995 160.0161,104.03 159.2251,104.995 C158.4301,105.962 157.9151,106.605 157.6751,106.922 C155.9881,109.155 153.8891,110.442 151.3721,110.793 C151.0901,110.832 150.6661,110.859 150.0991,110.864 C149.5291,110.874 149.1041,110.897 148.8261,110.935 L159.6581,96.597 C160.0181,96.118 160.7521,95.769 161.8631,95.541 C162.9711,95.315 163.9461,95.143 164.7851,95.026 L166.0431,94.851 L166.0431,94.851 Z M158.1641,242.419 L159.0031,242.303 C159.9791,242.166 161.2671,242.201 162.8661,242.406 L150.4391,259.106 L145.7071,258.909 L158.1641,242.419 L158.1641,242.419 Z M137.2111,256.245 L148.9751,240.92 L150.0231,240.773 C150.7211,240.677 151.2871,240.632 151.7161,240.646 C152.1451,240.656 152.6671,240.834 153.2871,241.176 L141.0391,257.635 L140.4101,257.723 C139.7091,257.82 139.0371,257.842 138.3891,257.791 C137.7401,257.737 137.3671,257.362 137.2691,256.663 L137.2111,256.245 L137.2111,256.245 Z M151.9501,99.594 L141.1181,113.934 C140.2791,114.05 139.5881,114.22 139.0501,114.436 C138.3681,114.674 137.7531,114.866 137.2061,115.013 C136.6551,115.163 136.1821,115.336 135.7811,115.532 L135.5721,115.562 L134.9421,115.648 L143.6081,104.178 C144.4871,103.345 145.6111,102.44 146.9721,101.464 C148.3331,100.492 149.7121,99.905 151.1111,99.711 L151.9501,99.594 L151.9501,99.594 Z M139.9411,237.475 L144.6391,238.959 L133.2651,254.015 C133.1431,254.172 132.8901,254.388 132.4991,254.655 C132.1091,254.924 131.7821,255.148 131.5231,255.326 L131.3131,255.356 C129.7731,255.57 128.5681,255.096 127.6941,253.936 L139.9411,237.475 L139.9411,237.475 Z M131.4741,235.02 L132.3131,234.903 C133.4311,234.747 134.4981,235.239 135.5131,236.382 L123.0261,252.661 L119.2561,251.69 L131.4741,235.02 L131.4741,235.02 Z M123.6121,230.77 L124.0311,230.711 L124.4511,230.652 C124.7491,230.755 125.1391,230.984 125.6161,231.345 C126.0941,231.707 126.4221,232.019 126.6011,232.278 L126.6311,232.487 L126.7181,233.116 L114.2031,249.187 L111.1261,247.05 L123.6121,230.77 L123.6121,230.77 Z M117.4911,225.208 C118.8471,225.733 119.6031,226.555 119.7591,227.672 C119.7781,227.813 119.7521,227.886 119.6831,227.895 C119.6111,227.905 119.5881,227.982 119.6071,228.119 L119.6661,228.539 L107.3901,244.789 L104.2831,242.442 L117.4911,225.208 L117.4911,225.208 Z M97.8651,236.281 L110.1121,219.821 C110.9901,219.985 111.5731,220.332 111.8601,220.859 C112.1481,221.392 112.3411,222.006 112.4381,222.704 L112.6131,223.962 L101.0591,239.257 C100.7581,239.159 100.2521,238.835 99.5351,238.294 C98.8181,237.752 98.3001,237.363 97.9821,237.119 C97.8411,237.14 97.7631,237.08 97.7431,236.939 L97.6841,236.52 L97.8651,236.281 L97.8651,236.281 Z M103.9911,214.259 C105.1871,214.663 105.8741,215.493 106.0491,216.751 L106.1661,217.591 L94.6121,232.885 L94.2221,233.153 L93.5631,233.031 L93.0851,232.67 C92.9251,232.552 92.8371,232.421 92.8171,232.28 C92.4961,232.041 92.1691,231.729 91.8321,231.349 C91.4921,230.969 91.4531,230.69 91.7151,230.51 L103.9911,214.259 L103.9911,214.259 Z M86.7121,222.226 L98.2661,206.931 L98.6561,206.662 C99.3541,206.565 99.8281,206.894 100.0761,207.642 C100.3201,208.392 100.4751,208.976 100.5341,209.395 L100.6211,210.024 L88.1361,226.305 C87.4191,225.264 86.9661,224.044 86.7701,222.645 L86.7121,222.226 L86.7121,222.226 Z M83.3521,145.93 C82.7871,141.876 82.7451,137.996 83.2281,134.293 C83.7081,130.592 84.2361,126.706 84.8111,122.633 C84.9771,120.76 85.3371,118.999 85.8921,117.351 C86.4451,115.707 87.0871,113.907 87.8131,111.951 C87.9121,111.653 88.1481,111.049 88.5231,110.142 C88.8941,109.235 89.2921,108.254 89.7161,107.195 C90.1381,106.141 90.5351,105.157 90.9101,104.249 C91.2811,103.343 91.5871,102.731 91.8291,102.411 C93.1771,99.801 94.8711,97.143 96.9191,94.433 C98.9641,91.725 100.8381,89.325 102.5441,87.233 C106.4331,82.414 110.5051,78.641 114.7591,75.909 C119.0091,73.179 123.7671,70.237 129.0311,67.079 C134.6911,63.725 140.0301,61.376 145.0491,60.036 C150.0641,58.696 155.8571,57.568 162.4321,56.652 C163.4091,56.516 164.6721,56.376 166.2221,56.231 C167.7691,56.089 169.3111,55.908 170.8511,55.693 C172.3891,55.479 173.7571,55.324 174.9561,55.228 C176.1521,55.135 176.8221,55.074 176.9631,55.055 C178.7791,54.802 180.6221,54.725 182.4901,54.819 C184.3541,54.917 186.1481,54.987 187.8661,55.033 C188.8811,55.178 190.3461,55.189 192.2531,55.063 C194.1611,54.94 195.7201,55.151 196.9381,55.692 C197.3771,55.775 198.1241,56.029 199.1821,56.45 C200.2361,56.873 201.4091,57.353 202.6961,57.884 C203.9801,58.421 205.1931,58.927 206.3301,59.41 C207.4661,59.892 208.3321,60.236 208.9321,60.437 C209.6881,60.759 210.0611,61.135 210.0511,61.564 C210.0371,61.994 210.0921,62.627 210.2091,63.466 L210.5011,65.564 C210.5411,65.845 210.4841,66.207 210.3331,66.656 C210.1821,67.106 210.0441,67.411 209.9261,67.569 C209.6831,67.89 209.3041,68.478 208.7811,69.331 C208.2591,70.189 207.7111,71.121 207.1391,72.126 C206.5651,73.135 206.0241,74.099 205.5121,75.025 C204.9991,75.953 204.6821,76.498 204.5631,76.655 C204.1191,77.572 203.5961,78.68 202.9941,79.975 C202.3901,81.272 201.7161,82.577 200.9741,83.891 C200.2281,85.207 199.3921,86.356 198.4611,87.341 C197.5291,88.327 196.4331,88.906 195.1751,89.082 C191.2591,89.627 187.2741,89.685 183.2251,89.249 C179.1721,88.818 175.1181,88.883 171.0641,89.447 L166.2391,90.119 C165.9571,90.159 165.2101,90.406 163.9911,90.861 C162.7711,91.317 162.0301,91.635 161.7711,91.812 C157.3911,93.137 153.1441,94.617 149.0261,96.259 C144.9051,97.903 141.2441,100.518 138.0371,104.099 C135.4331,106.888 133.2341,109.792 131.4481,112.82 C129.6581,115.851 127.7821,118.998 125.8141,122.266 C124.6681,124.279 123.9071,126.487 123.5301,128.893 C123.1501,131.297 122.9591,133.498 122.9531,135.494 C122.9931,135.776 123.0941,136.26 123.2631,136.947 C123.4301,137.639 123.5681,138.369 123.6751,139.136 C123.7821,139.906 123.8891,140.676 123.9961,141.443 C124.1031,142.213 124.0951,142.679 123.9761,142.836 C123.9961,142.977 123.9681,143.302 123.8981,143.809 C123.8261,144.32 123.6601,144.664 123.4001,144.841 L124.4521,152.392 C125.8361,162.323 128.8071,170.602 133.3661,177.237 C137.9261,183.871 144.2981,189.97 152.4861,195.528 C154.9951,197.177 157.6981,198.402 160.5901,199.21 C163.4821,200.02 166.4051,200.538 169.3601,200.768 C172.3121,200.998 175.3081,201.009 178.3461,200.799 C181.3801,200.59 184.2951,200.291 187.0941,199.9 L196.1131,198.645 C197.3331,198.19 198.7761,197.562 200.4481,196.757 C202.1171,195.957 203.4911,195.338 204.5721,194.899 C204.6911,194.742 205.1121,194.434 205.8331,193.975 C206.5521,193.522 207.2681,193.026 207.9801,192.501 C208.6881,191.975 209.3691,191.489 210.0221,191.04 C210.6711,190.595 211.1261,190.282 211.3881,190.101 C211.5251,190.082 211.9261,189.887 212.5881,189.506 C213.2471,189.13 213.7161,188.922 213.9971,188.882 L214.2071,188.853 C215.4661,188.678 216.6681,188.867 217.8141,189.42 C218.9611,189.975 220.0591,190.711 221.1161,191.633 C222.1701,192.555 223.1241,193.528 223.9811,194.548 C224.8361,195.571 225.5321,196.47 226.0691,197.25 C226.4261,197.772 227.0861,198.68 228.0511,199.968 C229.0131,201.26 230.0331,202.685 231.1061,204.246 C232.1791,205.808 233.2011,207.269 234.1761,208.631 C235.1471,209.991 235.8131,210.934 236.1731,211.452 L236.4071,213.13 C236.6411,214.808 236.2951,215.925 235.3771,216.481 C234.4551,217.037 233.2941,217.914 231.8931,219.105 C231.7721,219.265 231.4551,219.56 230.9471,219.985 C230.4351,220.413 229.9281,220.876 229.4301,221.372 C228.9281,221.869 228.4211,222.334 227.9121,222.76 C227.4001,223.189 227.0841,223.483 226.9661,223.64 C225.0431,225.19 222.8371,226.498 220.3481,227.556 C217.8561,228.614 215.4431,229.448 213.1061,230.061 C212.1451,230.336 210.7021,230.717 208.7741,231.199 C206.8441,231.682 204.8481,232.174 202.7791,232.676 C200.7111,233.179 198.8111,233.62 197.0841,234.003 C195.3531,234.386 194.2821,234.607 193.8621,234.666 L185.6821,235.806 L176.6621,237.063 C175.9611,237.16 174.8741,237.275 173.3961,237.411 C171.9181,237.543 170.3631,237.653 168.7381,237.74 C167.1091,237.823 165.5901,237.927 164.1841,238.054 C162.7751,238.176 161.7901,238.28 161.2331,238.358 C159.5161,238.31 157.5931,238.079 155.4701,237.664 C153.3441,237.248 151.4541,236.727 149.8001,236.102 C146.0891,235.052 142.6281,234 139.4181,232.951 C136.2041,231.901 132.9971,230.605 129.7871,229.054 C129.4671,228.814 128.6901,228.352 127.4561,227.668 C126.8371,227.326 126.3011,227.048 125.8421,226.824 C125.5211,226.584 124.9241,226.133 124.0491,225.47 C123.1721,224.811 122.2571,224.116 121.3011,223.394 C120.3451,222.671 119.4221,221.945 118.5381,221.212 C117.6511,220.481 117.0391,219.924 116.7021,219.545 C113.0551,216.918 109.7871,213.916 106.8941,210.54 C103.9991,207.168 101.6921,203.391 99.9701,199.21 C99.3171,197.59 98.3841,195.261 97.1791,192.221 C95.9711,189.182 94.7931,186.106 93.6471,182.985 C92.4971,179.867 91.4271,177.023 90.4271,174.452 C89.4281,171.886 88.8081,170.262 88.5721,169.579 C87.3251,165.764 86.2861,161.878 85.4531,157.933 C84.6151,153.985 83.9181,149.987 83.3521,145.93 L83.3521,145.93 L83.3521,145.93 Z M82.7001,213.376 L94.9751,197.126 L96.6671,201.595 L84.1821,217.875 C83.6841,217.375 83.3661,216.884 83.2281,216.402 C83.0881,215.925 82.9821,215.404 82.9041,214.845 L82.7001,213.376 L82.7001,213.376 Z M78.6281,204.107 L90.1531,188.604 L90.7831,188.516 L91.2021,188.457 C91.2221,188.597 91.3851,189.002 91.6921,189.672 C91.9991,190.344 92.2411,190.809 92.4211,191.067 L92.4791,191.487 L92.5671,192.115 L92.2651,193.014 L91.9621,193.91 L81.8521,207.293 L80.0811,208.396 C79.3451,207.216 78.8921,205.995 78.7161,204.736 L78.6281,204.107 L78.6281,204.107 Z M75.3671,194.512 L87.1311,179.188 L87.9701,179.071 L88.5551,183.267 L77.0001,198.561 C76.3621,198.081 75.9791,197.634 75.8511,197.224 C75.7221,196.815 75.6111,196.263 75.5131,195.561 L75.3671,194.512 L75.3671,194.512 Z M83.9041,168.305 C84.0811,168.566 84.3091,169.177 84.5861,170.135 C84.8601,171.095 85.0201,171.715 85.0591,171.993 L85.1471,172.622 L85.1761,172.832 L73.1391,189.263 L72.4081,184.019 L83.9041,168.305 L83.9041,168.305 Z M82.5061,113.761 C82.5451,114.042 82.5031,114.509 82.3811,115.167 C82.2591,115.826 82.1451,116.306 82.0461,116.605 C81.8431,117.203 81.6171,118.127 81.3631,119.372 C81.1091,120.62 80.9201,121.324 80.8021,121.481 L72.2871,132.504 C73.7961,129.016 75.2601,125.711 76.6801,122.591 C78.0961,119.473 80.0381,116.529 82.5061,113.761 L82.5061,113.761 L82.5061,113.761 Z M81.5751,157.725 L82.3341,163.178 L70.3901,178.741 L69.6011,173.077 L81.5751,157.725 L81.5751,157.725 Z M79.4191,131.51 C79.4771,131.929 79.5171,132.745 79.5451,133.952 C79.5701,135.161 79.5321,135.915 79.4331,136.213 C79.3311,136.514 79.1991,137.1 79.0371,137.979 C78.9551,138.417 78.9341,138.778 78.9741,139.057 L68.6541,152.468 L68.5081,151.419 C68.3911,150.58 68.3781,149.48 68.4751,148.109 C68.5681,146.743 68.9151,145.662 69.5191,144.863 L79.4191,131.51 L79.4191,131.51 Z M80.2301,148.076 C80.4251,149.476 80.5201,150.424 80.5201,150.923 C80.5171,151.424 80.0441,152.377 79.1021,153.793 L69.8951,165.981 L68.1241,167.081 L67.8611,165.193 C67.7841,164.637 67.7091,163.862 67.6441,162.872 C67.5781,161.887 67.6531,161.161 67.8771,160.702 L79.8211,145.14 L80.2301,148.076 L80.2301,148.076 Z" id="Fill-31" fill="#FFFFFF"></path>
            </g>
        </svg>
    </figure>
</div>
<header class="Header Container">
    <div class="BarNav row middle between">
        <a href="{{url('/')}}" class="col-2">
            <figure class="Logo">
                    <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
            </figure>
        </a>
        <nav class="row col-10 end">
            <ul class="Menu row between">
                <li><a href="{{route('addService')}}" class="orange-text">Postula tu servicio</a></li>
                @if(!Auth::check())
                    <li><a href="{{route('register')}}">Registrate</a></li>
                    <li><a href="{{route('login')}}">Entrar</a></li>
                @else
                    <li><a href="{{route('profile')}}">Bienvenid@ {{Auth::user()->name}}</a></li>
                @endif
                <li>
                    <div class="Menu-fixed">
                        <a href="#" class="Hamburguer">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <nav>
                            <ul class="col-4">
                                <li><a href="#">QUIENES SOMOS?</a></li>
                                <li><a href="#">PREGUNTAS FRECUENTES </a></li>
                                <li><a href="#">AYUDANOS A MEJORAR</a></li>
                                <li><a href="#">CONTACTANOS</a></li>
                                <li><a href="#">TESTIMONIOS</a></li>
                            </ul>
                        </nav>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    @yield('Services')
    <section class="Services middle">
        @yield('Header')
        <div class="Arrow"><a href="#" onclick="return false;"> <img src="{{asset('img/arrow.svg')}}" alt=""> </a></div>
    </section>
    <div class="backgroundVideo">
        <video class="cover" width="960" height="540" autoplay loop>
            @yield('Video')
        </video>
    </div>
</header>
@yield('content')
<footer class="Footer row middle center">
    <section class="row center middle col-5">
        <figure class="Logo col-6" style="margin-top: 20px">
            <img src="{{asset('img/logo.svg')}}" alt="cityconsumo">
        </figure>
        <nav class="col-12 self-end">
            <ul class="Menu-footer row center no-padding">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Preguntas frecuentes</a></li>
                <li><a href="#">Testimonios</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
        </nav>
    </section>
    <section class="row col-7 middle">
        <nav class="col-10">
            <ul class="no-padding Menu row" style="font-size: .77rem;">
                <li><a href="#">DOCUMENTACIÓN</a></li>
                <li><a href="#">TERMINOS Y CONDICIONES</a></li>
                <li><a href="#">COPYRIGHT</a></li>
            </ul>
        </nav>
        <nav class="col-2 end">
            <ul class="Socials">
                <li class="icon">
                    <a href="https://twitter.com/city_consumo">
                        <img src="{{asset('img/twitter.svg')}}" alt="twitter">
                    </a>
                </li>
                <li class="icon">
                    <a href="#">
                        <img src="{{asset('img/instagram.svg')}}" alt="instagram">
                    </a>
                </li>
                <li class="icon">
                    <a href="https://www.facebook.com/City-Consumo-1269145086448897/">
                        <img src="{{asset('img/facebook.svg')}}" alt="facebook">
                    </a>
                </li>
                <li class="icon">
                    <a href="#">
                        <img src="{{asset('img/letter.svg')}}">
                    </a>
                </li>
            </ul>
        </nav>
        <div class="Copy col-12 row end self-end">
            <p>2016 - Cityconsumo | Diseño Web &amp; posicionamiento SEO por Mouse Interactivo</p>
        </div>
    </section>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
</body>
</html>