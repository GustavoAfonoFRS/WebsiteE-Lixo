document.addEventListener('DOMContentLoaded', function () {

    
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        const handleScroll = () => {
            if (window.scrollY > 40) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
    }

    
    const revealEls = document.querySelectorAll('.reveal, .reveal-stagger');
    if (revealEls.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach(el => observer.observe(el));
    }

    
    const spotlight = document.getElementById('spotlight');
    if (spotlight && window.innerWidth > 768) {
        let visible = false;
        document.addEventListener('mousemove', (e) => {
            spotlight.style.left = e.clientX + 'px';
            spotlight.style.top  = e.clientY + 'px';
            if (!visible) { spotlight.style.opacity = '1'; visible = true; }
        }, { passive: true });
        document.addEventListener('mouseleave', () => {
            spotlight.style.opacity = '0'; visible = false;
        });
    }

    
    const counters = document.querySelectorAll('.stat-number');
    if (counters.length) {
        const countObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const el = entry.target;
                const text = el.textContent.trim();
                const match = text.match(/^([\d,.]+)(.*)$/);
                if (!match) return;

                const end = parseFloat(match[1].replace(/,/g, '.'));
                const suffix = match[2];
                const duration = 1400;
                const start = performance.now();

                const tick = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const ease = 1 - Math.pow(1 - progress, 3); 
                    const current = end * ease;

                    
                    if (text.includes('M')) {
                        el.textContent = Math.round(current) + suffix;
                    } else {
                        el.textContent = (current % 1 === 0 ? Math.round(current) : current.toFixed(0)) + suffix;
                    }
                    if (progress < 1) requestAnimationFrame(tick);
                };
                requestAnimationFrame(tick);
                countObserver.unobserve(el);
            });
        }, { threshold: 0.5 });

        counters.forEach(el => countObserver.observe(el));
    }

    
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        window.addEventListener('scroll', () => {
            const y = window.scrollY;
            const heroH1 = heroSection.querySelector('h1');
            const heroP  = heroSection.querySelector('p.lead');
            if (heroH1) heroH1.style.transform = `translateY(${y * 0.18}px)`;
            if (heroP)  heroP.style.transform  = `translateY(${y * 0.10}px)`;
        }, { passive: true });
    }

    
    if (document.getElementById('map')) {
        const map = L.map('map', { zoomControl: false }).setView([38.7223, -9.1393], 13);

        
        L.control.zoom({ position: 'bottomright' }).addTo(map);

        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19
        }).addTo(map);

        let markersLayer = L.markerClusterGroup({
            chunkedLoading: true,
            chunkInterval: 100,
            chunkDelay: 50,
            showCoverageOnHover: false,
            spiderfyOnMaxZoom: true,
            disableClusteringAtZoom: 16,
            animate: true,
            iconCreateFunction: function (cluster) {
                const count = cluster.getChildCount();
                return L.divIcon({
                    html: `<div style="
                        width:42px; height:42px;
                        background:#080808;
                        color:#fff;
                        border-radius:50%;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-family:'Inter',sans-serif;
                        font-size:12px;
                        font-weight:700;
                        border: 2px solid rgba(255,255,255,0.3);
                        box-shadow: 0 4px 16px rgba(0,0,0,0.25);
                    ">${count}</div>`,
                    className: '',
                    iconSize: [42, 42]
                });
            }
        }).addTo(map);

        function loadMarkers(formData = null) {
            let url = 'mapa.php?ajax=1';
            let isFiltered = false;

            if (formData) {
                const searchParams = new URLSearchParams(formData);
                url += '&' + searchParams.toString();
                isFiltered = true;
            }

            fetch(url)
                .then(r => r.json())
                .then(data => {
                    markersLayer.clearLayers();
                    const markersToAdd = [];

                    const listContainer = document.getElementById('listResults');
                    const countSpan     = document.getElementById('count');
                    const resultsInfo   = document.getElementById('resultsInfo');

                    if (listContainer) listContainer.innerHTML = '';
                    if (countSpan)     countSpan.innerText = data.length;
                    if (resultsInfo)   resultsInfo.classList.remove('d-none');

                    const displayLimit = 100;

                    const binIcon = L.icon({
                        iconUrl: 'blackrbin_marker_icon.png',
                        iconSize: [36, 36],
                        iconAnchor: [18, 36],
                        popupAnchor: [0, -38]
                    });

                    data.forEach((ponto, index) => {
                        const marker = L.marker([ponto.latitude, ponto.longitude], { icon: binIcon })
                            .bindPopup(`
                                <div style="font-family:'Inter',sans-serif; padding:1.1rem;">
                                    <p style="font-size:.67rem; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:#aaa; margin-bottom:.4rem;">${ponto.freguesia}</p>
                                    <h6 style="font-weight:700; margin-bottom:.8rem; font-size:.95rem; line-height:1.3;">${ponto.nome}</h6>
                                    <hr style="border-color:#eee; margin:.6rem 0;">
                                    <p style="font-size:.78rem; color:#666; margin-bottom:.3rem;"><strong style="color:#111;">Local:</strong> ${ponto.morada}</p>
                                    <p style="font-size:.78rem; color:#666; margin-bottom:.3rem;"><strong style="color:#111;">Horário:</strong> ${ponto.horario || '—'}</p>
                                    <p style="font-size:.78rem; color:#666; margin-bottom:.9rem;"><strong style="color:#111;">Tipo:</strong> ${ponto.tipo_residuo}</p>
                                    ${ponto.link_oficial ? `<a href="${ponto.link_oficial}" target="_blank" style="display:block; background:#080808; color:#fff; text-align:center; padding:.55rem 1rem; border-radius:999px; font-size:.75rem; font-weight:700; letter-spacing:.08em; text-decoration:none;">Ver Site Oficial</a>` : ''}
                                </div>
                            `, { maxWidth: 260, minWidth: 230 });

                        markersToAdd.push(marker);

                        if (listContainer && index < displayLimit) {
                            const item = document.createElement('a');
                            item.href = '#';
                            item.className = 'map-result-item';
                            item.innerHTML = `
                                <h6 style="font-size:.82rem; font-weight:700; margin-bottom:.2rem; color:#111;">${ponto.nome}</h6>
                                <p style="font-size:.75rem; color:#888; margin:0;">${ponto.freguesia}</p>
                            `;
                            item.onclick = (e) => {
                                e.preventDefault();
                                map.setView([ponto.latitude, ponto.longitude], 17);
                                setTimeout(() => marker.openPopup(), 300);
                            };
                            listContainer.appendChild(item);
                        }
                    });

                    markersLayer.addLayers(markersToAdd);

                    if (data.length > 0 && isFiltered) {
                        map.fitBounds(markersLayer.getBounds().pad(0.1));
                    }
                })
                .catch(err => console.error('Map error:', err));
        }

        loadMarkers();

        
        const filterForm = document.getElementById('filterForm');
        if (filterForm) {
            filterForm.onsubmit = function (e) {
                e.preventDefault();
                loadMarkers(new FormData(this));
            };
            const resetBtn = document.getElementById('resetFilters');
            if (resetBtn) {
                resetBtn.onclick = function () {
                    filterForm.reset();
                    loadMarkers();
                };
            }
        }
    }

});
