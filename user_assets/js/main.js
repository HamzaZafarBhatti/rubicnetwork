/* ==============
 ========= Js Documentation =========

 Template Name: Revest
 Version: 1.0
 Description: Real Estate Investment For Everyone
 Author: Pixelaxis
 Author URI: https://themeforest.net/user/pixelaxis

    =========================

     01. data background
     ---------------------------
     02. animated hamburger menu
     ---------------------------
     03. position navbar on scroll and resize
     ---------------------------
     04. job details tab
     ---------------------------
     05. property list and grid tabs
     ---------------------------
     06. faq tab
     ---------------------------
     07. property list and grid two
     ---------------------------
     08. Scroll Bottom To Top

    =========================
============== */

(function ($) {
  "use strict";

  jQuery(document).ready(function () {
    // data background
    $("[data-background]").each(function () {
      $(this).css(
        "background-image",
        "url(" + $(this).attr("data-background") + ")"
      );
    });

    // animated hamburger icon
    $(".navbar-toggler").on("click", function () {
      $(this).toggleClass("toggle-active");
      $(".navbar").toggleClass("navbar__active");
    });

    // position navbar on scroll and resize
    $(window).on("scroll", function (e) {
      var scroll = $(window).scrollTop();
      if ((scroll > 10) | (scroll == 10)) {
        $(".header").addClass("header__active");
      } else {
        $(".header").removeClass("header__active");
      }
    });

    $(window).resize(function () {
      if ($(".dropdown-menu").hasClass("show")) {
        $(".dropdown-menu").removeClass("show");
        $(".dropdown-toggle").removeClass("show");
      }

      if ($(".alt__loan__grid").hasClass("col-12 alt__loan__list")) {
        $(".alt__loan__grid")
          .removeClass("col-12 alt__loan__list")
          .addClass("col-md-6 col-xl-4");
      }
    });

    // job details tab
    $(".position__details__content").hide();
    $(".position__details__content:first").show();
    $(".job__application__btn").on("click", function () {
      $(".job__application__btn").addClass("button--secondary");
      $(this).removeClass("button--secondary");
      $(".position__details__content").hide();
      var activeTransaction = $(this).attr("href");
      $(activeTransaction).fadeIn(100);
      return false;
    });

    // property list and grid tabs
    $(".grid__view").on("click", function () {
      $(".property__grid__area__wrapper__inner").addClass(
        "col-xl-4 col-md-6",
        400
      );
      $(".property__grid__area__wrapper__inner__two").removeClass("col-xl-5");
      $(".property__grid__area__wrapper__inner__three").removeClass("col-xl-7");
      $(".property__list__wrapper").addClass("property__grid");
    });

    $(".grid__list").on("click", function () {
      $(".property__grid__area__wrapper__inner").removeClass(
        "col-xl-4 col-md-6",
        400
      );
      $(".property__grid__area__wrapper__inner__two").addClass("col-xl-5");
      $(".property__grid__area__wrapper__inner__three").addClass("col-xl-7");
      $(".property__list__wrapper").removeClass("property__grid");
    });

    $(".grid__btn").on("click", function () {
      $(".grid__btn").removeClass("grid__btn__active");
      $(this).addClass("grid__btn__active");
    });

    // faq tab
    $(".faq__tab__content").hide();
    $(".faq__tab__content:first").show();
    $(".faq__tab__btn").on("click", function () {
      $(".faq__tab__btn").removeClass("faq__tab__btn__active");
      $(this).addClass("faq__tab__btn__active");
      $(".faq__tab__content").hide();
      var activeTransactionf = $(this).attr("href");
      $(activeTransactionf).fadeIn(100);
      return false;
    });

    // property list and grid two
    $(".grid__vieww").on("click", function () {
      $(".alt__loan__grid").addClass("col-xl-4 col-md-6", 400);
      $(".alt__loan__grid").removeClass("col-12 alt__loan__list");
    });

    $(".grid__listt").on("click", function () {
      $(".alt__loan__grid").removeClass("col-xl-4 col-md-6", 400);
      $(".alt__loan__grid").addClass("col-12 alt__loan__list");
    });

    $(".grid__btnn").on("click", function () {
      $(".grid__btnn").removeClass("grid__btnn__active");
      $(this).addClass("grid__btnn__active");
    });

    // Scroll Bottom To Top
    var ScrollTop = $(".scrollToTop");
    $(window).on("scroll", function () {
      if ($(this).scrollTop() < 500) {
        ScrollTop.removeClass("active");
      } else {
        ScrollTop.addClass("active");
      }
    });

    $(".scrollToTop").on("click", function () {
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        500
      );
      return false;
    });
  });
})(jQuery);
