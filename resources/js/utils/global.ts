import store from '../store/index'


export default class global {

  static setDefaultImage(event, defaultImage, imagePath) {
    const img = new Image();
    img.src = imagePath;
    img.onerror = () => {
      event.target.src = process.env.MIX_APP_URL + '' + process.env.MIX_DEFAULT_IMAGE
    };
  }

  static setDefaultBackgroundImage(event, defaultImage, imagePath) {
    const img = new Image();
    img.src = imagePath;
    img.onerror = () => {
      event.target.style.backgroundImage = `url(${defaultImage})`;
    };
  }


  static getImageUrl(item: any, type: any) {
    if (type == 'product') {
      if (item?.bank_path_image) {
        return process.env.MIX_BASE_URL + item?.bank_path_image;
      } else if (item?.bankimage?.path_image) {
        return process.env.MIX_BASE_URL + item?.bankimage?.path_image;
      } else if (item?.bankimage?.thumbnail_image) {
        return process.env.MIX_BASE_URL + item?.bankimage?.thumbnail_image;
      } else if (item?.bank_thumbnail_image) {
        return process.env.MIX_BASE_URL + item?.bank_thumbnail_image;
      } else if (item?.path_image) {
        return process.env.MIX_BASE_URL + item?.path_image;
      } else if (item?.thumbnail_image) {
        return process.env.MIX_BASE_URL + item?.thumbnail_image;
      } else if (item?.category_logo) {
        return process.env.MIX_BASE_URL + item?.category_logo;
      }
    } else if (type == 'promo') {
      if (item?.path_image) {
        return process.env.MIX_BASE_URL + item?.path_image;
      } else if (item?.product?.bank_thumbnail_image) {
        return process.env.MIX_BASE_URL + item?.product?.bank_thumbnail_image;
      } else if (item?.product?.bank_path_image) {
        return process.env.MIX_BASE_URL + item?.product?.bank_path_image;
      }
    } else if (type == 'category') {
      if (item?.bankimage?.thumbnail_image) {
        return process.env.MIX_BASE_URL + item?.bankimage?.thumbnail_image;
      } else if (item?.bankimage?.path_image) {
        return process.env.MIX_BASE_URL + item?.bankimage?.path_image;
      } else if (item?.logo) {
        return process.env.MIX_BASE_URL + item?.logo;
      }
    } else if (type == 'store') {
      if (item?.cover) {
        return process.env.MIX_BASE_URL + item?.cover;
      }
    } else if (type = 'logo') {
      return process.env.MIX_APP_URL + item;

    }
    return process.env.MIX_APP_URL + '' + process.env.MIX_DEFAULT_IMAGE;

  }


  static openSideRight() {
    store.state.isSideRightOpening = !store.state.isSideRightOpening
    store.state.isSideLeftOpening = false
    if (store.state.isSideRightOpening) {
      document.body.classList.add('modal-open');
    } else {
      document.body.classList.remove('modal-open');
      document.querySelector('.liv-dropleft-cart').classList.remove('open-cart')
    }
  }


  static openSideLeft() {
    store.state.isSideLeftOpening = !store.state.isSideLeftOpening
    store.state.isSideRightOpening = false
    if (store.state.isSideLeftOpening) {
      document.body.classList.add('modal-open');
    } else {
      document.body.classList.remove('modal-open');
      document.querySelector('.liv-dropright-cart').classList.remove('open-cart')
    }
  }


}