import store from "../store/index";
import ProductUtils from "./ProductUtils";

export default class DiscountUtils {
    constructor(products) {
        this.products = products;
    }

    /*static calculateDiscountPromotions(
       quantityProduct: number,
       priceProduct: number,
       totalPriceWithSubProducts: number,
       Promo: {
           min: number,       // Z = quantity to buy
           free: number,      // N = quantity free
           percentage: number // discount percentage
       }
     ) {
 
       let quantityMin = (Promo.min);
       let quantityFree = Promo.free;
       let discountPercentage = Promo.percentage;
 
       let promoResult = {
           priceProduct: priceProduct,
           quantityProduct: quantityProduct,
           quantityToGive: 0,
           quantityToSell: 0,
           discountPercentage: discountPercentage,
           totalPriceWithoutDiscount: (quantityProduct * priceProduct),
           priceProductDiscounted: 0,
           discount: 0,
           TotalPriceWithSubProducts: totalPriceWithSubProducts,
           text: '',
           status: false
       };
 
       if (quantityMin == 0 && quantityFree == 0 && discountPercentage < 100) {
           promoResult.quantityToGive = 0;
           promoResult.discountPercentage = discountPercentage;
           promoResult.quantityToSell = quantityProduct;
           promoResult.priceProductDiscounted = quantityProduct * priceProduct * (1 - (discountPercentage / 100));
           promoResult.discount = quantityProduct * priceProduct * ((discountPercentage / 100));
           promoResult.text = (discountPercentage == 100) ? ' Produit(s) gratuit ' : "-" + discountPercentage + '%';
           promoResult.status = true
       } else if (quantityProduct >= quantityMin && quantityMin > 0 && quantityFree > 0) {
 
           let quantityToSell = quantityProduct;
           let quantityToGive = Math.floor(quantityProduct / quantityMin) * quantityFree;
 
           let finalPrice = quantityToSell * priceProduct;
           let discount = 0;
           if (quantityToSell == quantityToGive) {
               discount = quantityToGive * priceProduct * (discountPercentage / 100);
           }   else
                 discount = quantityToGive * priceProduct * (discountPercentage / 100);
 
           // let quantityToGive = parseInt((quantityProduct / quantityMin)) * quantityFree;
           // let quantityToSell = quantityProduct - quantityToGive;
           // let discount = quantityToGive * priceProduct * (discountPercentage / 100);
           // let finalPrice = (quantityProduct * priceProduct) - discount;
 
           promoResult.quantityToGive = quantityToGive;
           promoResult.discountPercentage = discountPercentage;
           promoResult.quantityToSell = quantityToSell;
           promoResult.priceProductDiscounted = finalPrice;
           promoResult.discount = discount
           promoResult.text = (discountPercentage < 100) ? "-" + discountPercentage + '% sur ' + promoResult.quantityToGive + ' article(s)' : promoResult.quantityToGive + ' article(s) gratuit'
           promoResult.status = true
       }  
       return promoResult;
   }  


  
   static calculateDiscountPromotions(
      quantityProduct: number,
      priceProduct: number,
      totalPriceWithSubProducts: number,
      Promo: {
          min: number,       // Z
          free: number,      // N
          percentage: number // 100 for free, or 50 for partial
      }
  ) {
      const quantityMin = Promo.min;
      const quantityFree = Promo.free;
      let discountPercentage = Promo.percentage;

      let quantityToGive = 0;
      let quantityToSell = quantityProduct;
      let discount = 0;
      let priceProductDiscounted = 0;
      let text = '';
      let status = false;

      const totalPrice = quantityProduct * priceProduct;

       
       if (quantityMin == 0 && quantityFree == 0 && discountPercentage < 100) {
           quantityToGive = 0;
           discountPercentage = discountPercentage;
           quantityToSell = quantityProduct;
           priceProductDiscounted = quantityProduct * priceProduct * (1 - (discountPercentage / 100));
           discount = quantityProduct * priceProduct * ((discountPercentage / 100));
           text = (discountPercentage == 100) ? ' Produit(s) gratuit ' : "-" + discountPercentage + '%';
           status = true
       }

      // Case 1: Partial discount on the next item (e.g. "buy 1, 2nd at 50%")
      else if (quantityProduct >= (quantityMin + quantityFree) && quantityMin > 0 && quantityFree > 0 && discountPercentage < 100) {
          // Example: Buy 1, 2nd at 50%
           const eligibleGroups = quantityFree; // Math.floor(quantityProduct / (quantityMin + quantityFree));
          // const remaining = quantityProduct % (quantityMin + quantityFree);

          quantityToSell = quantityProduct;
          discount = eligibleGroups * priceProduct * (discountPercentage / 100);
          priceProductDiscounted = totalPrice - discount;
          text = `-${discountPercentage}% sur ${eligibleGroups} article(s)`;
          status = eligibleGroups > 0;
       } // Case 2: Partial discount on the next item (e.g. "buy 1, 2nd at 50%") ==> to fix
       else  if (quantityProduct >= (quantityMin + quantityFree) && quantityMin > 0 && quantityFree > 0 && discountPercentage < 100) {
               // Example: Buy 1, 2nd at 50%
               const eligibleGroups = quantityFree; // Math.floor(quantityProduct / (quantityMin + quantityFree));
               // const remaining = quantityProduct % (quantityMin + quantityFree);

               quantityToSell = quantityProduct;
               discount = eligibleGroups * priceProduct * (discountPercentage / 100);
               priceProductDiscounted = totalPrice - discount;
               text = `-${discountPercentage}% sur ${eligibleGroups} article(s)`;
               status = eligibleGroups > 0;
           }
      // Case 3: Free items (100% discount)
       else if (quantityProduct >= (quantityMin + quantityFree) &&  quantityMin > 0 && quantityFree > 0 && discountPercentage === 100) {
          const bundleSize = quantityMin + quantityFree;
          const fullBundles = Math.floor(quantityProduct / bundleSize);
          const remaining = quantityProduct % bundleSize;

          quantityToGive = fullBundles * quantityFree;
          quantityToSell = fullBundles * quantityMin + Math.min(remaining, quantityMin);

          discount = quantityToGive * priceProduct;
          priceProductDiscounted = quantityToSell * priceProduct;
          text = `${quantityToGive} article(s) gratuit(s)`;
          status = fullBundles > 0;
      }

      // Fallback: No promotion
      else {
          quantityToGive = 0;
          quantityToSell = quantityProduct;
          priceProductDiscounted = totalPrice;
          discount = 0;
          text = '';
          status = false;
      }


      const promoResult = {
          priceProduct,
          quantityProduct,
          quantityToGive,
          quantityToSell,
          discountPercentage,
          totalPriceWithoutDiscount: totalPrice,
          priceProductDiscounted,
          discount,
          TotalPriceWithSubProducts: totalPriceWithSubProducts,
          text,
          status
      }; 
      return promoResult
      
  }    */

    static calculateDiscountPromotions(
        quantityProduct: number,
        priceProduct: number,
        totalPriceWithSubProducts: number,
        promo: {
            min: number; // Z
            free: number; // N
            percentage: number; // 100 for free, or 50 for partial
            limit?: number | null; // optional limit of uses per customer
        },
        deliveryMode: string,
        timesUsed: number // how many times this promo has already been used by the customer
    ) {
        promo.limit = promo?.limit ? promo?.limit : null;
    
        const { min, free, percentage, limit } = promo;

        const result = {
            priceProduct,
            quantityProduct,
            quantityToGive: 0,
            quantityToSell: quantityProduct,
            discountPercentage: percentage,
            totalPriceWithoutDiscount: quantityProduct * priceProduct,
            priceProductDiscounted: quantityProduct * priceProduct,
            discount: 0,
            TotalPriceWithSubProducts: totalPriceWithSubProducts,
            text: "",
            status: false,
        };

        // this for promo has percentage < 100, offert or moitié prix
        const isPartialDiscount = percentage < 100;
        // this for promo has free articles, gratuit
        const isFullDiscount = percentage === 100;

        // 🔢 Calculate number of full promo sets
        let promoSets = Math.floor(quantityProduct / (min + free));
        if (!isFinite(promoSets)) promoSets = 0;

        // ✅ Apply limit if defined
        if (limit !== undefined && limit !== null) {
            const remainingUses = Math.max(0, limit - timesUsed);
            promoSets = Math.min(promoSets, remainingUses);
        }


        let quantityToGive = promoSets * free;
        if (isNaN(quantityToGive)) quantityToGive = 0;

        // 🎯 Case 1: Standard percentage discount (no buy x get y logic)
        if (min === 0 && free === 0 && isPartialDiscount) {
            // const discount = result.totalPriceWithoutDiscount * (percentage / 100);
            // result.discount = discount;
            // result.priceProductDiscounted -= discount;
            // result.text = -${percentage}%;
            // result.status = true;

            if (limit === undefined || (limit !== null && timesUsed < limit   )) {
                const discount =
                    result.totalPriceWithoutDiscount * (percentage / 100);
                result.discount = discount;
                result.priceProductDiscounted -= discount;
                result.text = `-${percentage}%`;
                result.status = true;
            }
        }

        // 🎯 Case 2: Partial discount with "buy x get y at discount"
        else if (isPartialDiscount && deliveryMode == 'cac') {
            const isSpecific50 = min === 1 && free === 1;
            const discount = quantityToGive * priceProduct * (percentage / 100);
            result.discount = discount;
            result.priceProductDiscounted -= discount;

            if (quantityToGive > 0) {
                result.text = isSpecific50
                    ? `${quantityToGive} pizza moitié prix - ${percentage}%`
                    : `${quantityToGive} article(s) à moitié prix - ${percentage}%`;
                result.status = true;
            }
        }

        // 🎯 Case 3: 100% Free products ("Buy X get Y free")
        else if (isFullDiscount) {
            // Edge case: force promo if only one item is added
            promoSets =
                quantityProduct === min && free === 1
                    ? 1
                    : Math.floor(quantityProduct / min);
            // Apply remaining uses limit
            if (limit !== undefined && limit !== null) {
                const remainingUses = Math.max(0, limit - timesUsed);
                promoSets = Math.min(promoSets, remainingUses);
            }

            quantityToGive = promoSets * free;
            
            if (quantityToGive > 0) {
                result.text = `+${quantityToGive} article(s) gratuit(s)`;
                result.status = true;
            }
        }

        result.quantityToGive = quantityToGive;
        return result;
    }

    /* static isProductOnPromotion(product) {
         // I remove the old discount from the cart and i add a new discount if i find it
         if (product?.promotion?.discount) {
             store.state.cartStore.discountPromotions -= product?.promotion?.discount
             product.promotion = {}
         }
         // The promotion applies only to the product price and does not include sub-products
         if (product?.promos?.length > 0 && product.quantity >= 1) {
             // This to get the real price of product ( I added this code to get price product if has type size  )
             let productPrice = ProductUtils.productPrice(product)
             // First check if the promotion has been affected to the product or the sub product
             let promoFound = product.promos.find((item) => item["product_id"] === product.id && item["sub_product_id"] == null) ? true : false
             if (!promoFound) {
                 product?.groups?.map((groupObj, indexGrp) => {
                     if (groupObj?.button_type == "RadioButton" && groupObj?.type == "size") {
                         promoFound = groupObj?.sub_products.find(
                             (subProductObj) => subProductObj?.checked && product?.promos[0].sub_product_id == subProductObj.id
                         ) ? true : false
                     }
                 });
             }
             // if promo found re-calculate discount
             if (promoFound) {
                 let promotions = this.calculateDiscountPromotions(
                     product.quantity,
                     productPrice,
                     0,
                     product.promos[0]
                 );
                 if (promotions?.status) {
                     store.state.cartStore.discountPromotions = store.state.cartStore.discountPromotions + promotions.discount
                     product.promotion = promotions
                 }
             }
         }
         return product
     }*/

    /**
     * remove promo feilds Only on delivery mode LIV
     */

    static removePromosOnDeliveryModeLIV() {
        const deliveryMode = store.state.cartStore.deliveryMode;
        let status = false;
        if (deliveryMode === "liv") {
            store.state.cartStore.discountPromotions = 0;

            store.state.cartStore?.products?.forEach((product: any) => {
                if (product?.promos?.length > 0 && product.quantity >= 1) {
                    let promoFound = false;

                    // Check if promo applies to main product
                    const mainPromo = product?.promos.find(
                        (item: any) =>
                            item["product_id"] === product.id &&
                            item["sub_product_id"] == null
                    );
                    if (mainPromo) {
                        status = true;
                        promoFound = true;
                        product.promos = null;
                        product.promotion = null;
                    }

                    // Check if promo applies to a selected sub-product (e.g., size)
                    product?.groups?.forEach((groupObj: any) => {
                        if (
                            groupObj?.button_type === "RadioButton" &&
                            groupObj?.type === "size"
                        ) {
                            groupObj?.sub_products?.forEach(
                                (subProductObj: any) => {
                                    const matchesPromo =
                                        subProductObj?.checked &&
                                        product?.promos?.[0]?.sub_product_id ===
                                            subProductObj.id;

                                    if (matchesPromo) {
                                        status = true;
                                        promoFound = true;
                                        product.promos = null;
                                        product.promotion = null;

                                        // Optional: if you store promotions at sub-product level, nullify here too
                                        subProductObj.promos = null;
                                    }
                                }
                            );
                        }
                    });

                    // Don't add any discount if a promo was removed
                    if (promoFound) {
                        // No discount added when LIV
                        store.state.cartStore.discountPromotions += 0;
                    }
                }
            });
        }
        return status;
    }

    static isProductOnPromotion() {
        store.state.cartStore.discountPromotions = 0;
        store.state.cartStore?.products?.map(
            (product: any, indexProduct: number) => {
                // The promotion applies only to the product price and does not include sub-products
                if (product?.promos?.length > 0 && product.quantity >= 1) {
                    // This to get the real price of product ( I added this code to get price product if has type size  )
                    let productPrice = ProductUtils.productPrice(product);

                    // if promo found re-calculate discount
                    if (product?.promos?.length > 0) {
                        product?.promos?.map(
                            (promo: any, indexPromo: number) => {
                                // First check if the promotion has been affected to the sub product
                                if (
                                    promo !== null &&
                                    promo?.product_id === product.id &&
                                    promo?.sub_product_id === null
                                ) {
                                    promo.limit = promo?.limit ?? 150;
                                    let promotions =
                                        this.calculateDiscountPromotions(
                                            product.quantity,
                                            productPrice,
                                            0,
                                            promo,
                                            store.state.cartStore.deliveryMode,
                                            0 // max 2 uses per customer
                                        );
                                    product.promotion = promotions;
                                    store.state.cartStore.discountPromotions =
                                        store.state.cartStore
                                            .discountPromotions +
                                        promotions.discount;
                                }
                            }
                        );
                    }

                    product?.groups?.map((groupObj: any, indexGrp: number) => {
                        if (
                            groupObj?.button_type == "RadioButton" &&
                            groupObj?.type == "size" &&
                            groupObj?.sub_products?.length > 0
                        ) {
                            groupObj?.sub_products?.map(
                                (subProduct: any, indexPromo: number) => {
                                    if (
                                        subProduct?.promo !== null &&
                                        subProduct?.checked &&
                                        subProduct?.promo?.sub_product_id ===
                                            subProduct?.id
                                    ) {
                                       
                                        subProduct.promo.limit =
                                            subProduct?.promo?.limit ?? 150;
                                        let promotions =
                                            this.calculateDiscountPromotions(
                                                product.quantity,
                                                productPrice,
                                                0,
                                                subProduct?.promo,
                                                store.state.cartStore
                                                    .deliveryMode,
                                                0 // max 2 uses per customer
                                            );
                                        product.promotion = promotions;
                                        store.state.cartStore.discountPromotions =
                                            store.state.cartStore
                                                .discountPromotions +
                                            promotions.discount;
                                    }
                                }
                            );
                        }
                    });
                }
            }
        );
    }

    /** Recalculate all discount [promotions, promocode, carte fidélité ] */
    static ReCalculateAllDiscounts() {
        let subTotal = store.state.cartStore?.subTotal;
        store.state.cartStore.totalFinal = subTotal;
        store.state.cartStore.discountCouponcode =
            store.state.cartStore.discountCouponcode || 0;
        store.state.cartStore.discountPromotions =
            store.state.cartStore.discountPromotions || 0;
        store.state.cartStore.discountFidelite =
            store.state.cartStore.discountFidelite || 0;
        let configLoyaltyCard =
            store.state.storeData?.data?.config_loyalty || [];
        let loyaltyCard = store.state.userStore?.loyaltyCard || {};

        if (store.state.cartStore.discountPromotions > 0) {
            subTotal -= store.state.cartStore.discountPromotions;
        }

        if (configLoyaltyCard[0]?.nb_orders - 1 == loyaltyCard?.nb_orders) {
            store.state.cartStore.discountFidelite =
                subTotal * (configLoyaltyCard[0]?.percentage / 100);
            subTotal -= store.state.cartStore.discountFidelite;
        }

        if (store.state?.storeData?.couponCode?.percentage) {
            store.state.cartStore.discountCouponcode =
                subTotal *
                (store.state?.storeData?.couponCode?.percentage / 100);
            subTotal -= store.state.cartStore.discountCouponcode;
        }

        store.state.cartStore.totalFinal = Math.abs(
            subTotal + store.state.cartStore?.deliveryTotal
        );
        store.state.cartStore.discountTotal =
            store.state.cartStore?.discountFidelite +
            store.state.cartStore?.discountCouponcode +
            store.state.cartStore?.discountPromotions;
    }
}
