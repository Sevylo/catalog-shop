import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
    Alpine.store('cart', {
        items: JSON.parse(localStorage.getItem('cart') || '[]'),
        
        init() {
            this.$watch('items', (value) => {
                localStorage.setItem('cart', JSON.stringify(value));
            });
        },
        
        add(product, qty = 1) {
            const existing = this.items.find(i => i.id === product.id);
            if (existing) {
                existing.qty += parseInt(qty);
            } else {
                this.items.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    sale_price: product.sale_price,
                    effective_price: product.sale_price || product.price,
                    image: product.image_url,
                    qty: parseInt(qty)
                });
            }
            this.save();
            
            // Dispatch event for toast notification
            window.dispatchEvent(new CustomEvent('notify', {
                detail: { message: `${product.name} ditambahkan ke keranjang!` }
            }));
        },
        
        updateQty(id, qty) {
            const item = this.items.find(i => i.id === id);
            if (item) {
                item.qty = parseInt(qty);
                if (item.qty <= 0) {
                    this.remove(id);
                } else {
                    this.save();
                }
            }
        },
        
        remove(id) {
            this.items = this.items.filter(i => i.id !== id);
            this.save();
        },
        
        save() {
            localStorage.setItem('cart', JSON.stringify(this.items));
        },
        
        get totalItems() {
            return this.items.reduce((sum, item) => sum + item.qty, 0);
        },
        
        get subtotal() {
            return this.items.reduce((sum, item) => sum + (item.effective_price * item.qty), 0);
        },
        
        formatPrice(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(value);
        }
    });
});

Alpine.start();
