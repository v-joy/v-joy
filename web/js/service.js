shopModule.factory("productService", ["$resource", function ($resource) {
    return $resource(
        "/ajax/product",
        {},
        {
            "find": { method: "GET", params: {}},
        }
    );
}]);
