# Pagination

Allow users to navigate through a paginated list of information, such as in a table.

```html
<x-govuk::pagination
    label="Related table label"
    :paginator="$results->pagination"
/>
```

Three types of paginator are provided:

* Length aware
* Simple
* Stacked

Each type has been designed to work with Laravel's `AbstractPaginator` classes, such as those retrieved from Eloquent queries.

You should use the:

* Length aware paginator with large result sets when possible
* Simple paginator with sets of information that have no fixed length, or are too expensive to calculate as a fixed set
* Stacked for simple forward and backward page navigation

## Props

| Name        | Type                       | Default  | Description                                                      |
|-------------|----------------------------|----------|------------------------------------------------------------------|
| label       | string                     | Required | The label of the associated list of information, such as a table |
| paginator   | array or AbstractPaginator | Required | The pagination information                                       |
| showCounter | bool                       | false    | Whether to show the X of Y results counter                       |
| stacked     | bool                       | false    | Whether to show the pagination as stacked                        |

### Paginator

You may either pass in an `AbstractPaginator` instance, or an array.

#### Stacked
Provide the following keys along with the `stacked` flag for a stacked paginator:

* next_page_url
* prev_page_url
* current_page

You may also provide either the total number of pages, or labels:

* total

**or**

* next_page_label
* prev_page_label

#### Simple
Simple pagination requires the following keys:

* current_page
* first_page_url
* from
* next_page_url
* prev_page_url
* to

#### Length aware
Length aware pagination requires the following additional keys:

* last_page
* last_page_url
* links
* total

## Subcomponents

* pagination.length-aware
* pagination.simple
* pagination.stacked

## Also see

* [table](table.md)
