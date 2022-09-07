import { Controller } from "@hotwired/stimulus"

export default class extends Controller {
    connect() {
        this.element.textContent = 'Artists, the into life bringers of music and other art';
    }
    favorite() {
        console.log('Gorillaz');
    }
}